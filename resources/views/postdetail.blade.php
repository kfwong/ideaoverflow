@extends('template')

@section('page-title', $post->title )

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
    {{ Html::style('css/posts.css') }}
@endsection

@section('script')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/salvattore/1.0.9/salvattore.min.js') }}
    <script type="text/javascript" src="{{ asset('js/likebutton.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/viewLikers.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready(function ($) {
            $('.edit-comment').hide();

            $('.btn-delete-comment').click(function (event) {
                $('.create-comment').hide();
                comment_id = event.currentTarget.id.substring(13);
                $('#comment-' + comment_id + '>.display-comment').hide();
                $('#comment-' + comment_id + '>.edit-comment').show();
                $('#comment-edit-' + comment_id).hide();

                $('.cancel').click(function (event) {
                    $('.create-comment').show();
                    comment_id = event.currentTarget.id.substring(15);
                    $('#comment-' + comment_id + '>.display-comment').show();
                    $('#comment-' + comment_id + '>.edit-comment').hide();
                    $('#comment-edit-' + comment_id).show();
                });
            });

            $(document).on('likes-count-changed', function (event, likesCount) {
                $('.likes-count').text(likesCount);
                if (likesCount == 0) {
                    $('.show-likers').hide();
                } else {
                    $('.show-likers').show();
                    if (likesCount > 1) {
                        $('.likers-state').text('s like');
                    } else {
                        $('.likers-state').text(' likes');
                    }
                }

            })
        });

        function confirmDelete() {
            var x = confirm("Are you sure you want to delete this comment?");
            return x;
        }
    </script>
@endsection

@section('content')
    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">

            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    {{ Session::get('message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="posts">
                <div class="jumbotron">
                    @can('update', $post)
                    <a href="/posts/{{$post->id}}/edit" class="close" id="btn-edit-post"><span aria-hidden="true"><i
                                    class="fa fa-pencil"></i></span></a>
                    @endif
                    <h1>{{ $post->title }}</h1>
                    <h5>
                        <p>
                            by {{ucfirst($post->user->name)}} <a
                                    href="{{ '/users/'.$post->user->id }}">{{ '@'. $post->user->username }}</a>
                        </p>
                    </h5>
                    <p style="hyphens: auto;word-wrap: break-word;">{{ $post->body }}</p>
                </div>
                <div>
                    <button class="btn btn-{{(count($post->likes) > 0)? 'primary':'default' }} btn-sm btn-like"
                            data-post-id="{{ $post->id }}" @cannot('like', App\Post::class) {{ 'disabled' }} @endcannot >
                        <span class="fa fa-thumbs-up"></span><span
                                class="like-state">{{(count($post->likes) > 0)? 'Liked ':'Like ' }}</span></span>
                    </button>

                    <a href="" class="show-likers" data-toggle="modal" data-target="#exampleModal"
                       data-post-id="{{$post->id}}" {{($post->likes_count == 0)? 'hidden':''}}><span
                                class="likes-count">{{$post->likes_count}}</span> user<span
                                class="likers-state">{{$post->likes_count>1? 's like':' likes'}}</span> this post</a>

                    <div id="tags-container" class="hidden-xs">
                        <span class="label {{'tag-'.lcfirst(($post->tags->where('type','Post')->first())['name'])}}">{{($post->tags->where('type','Post')->first())['name']}}</span>
                    </div>
                </div>

            </div>
            <!-- posts -->

            <!-- Comments Section -->
            <div id="comments">
                <h3>{{'Comments ('.$post->comments_count.')'}}</h3>
                @if($post->comments_count <= 0)
                    <p>No comments</p>
                @else
                    @foreach($post->comments as $comment)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @can('destroy', $comment)
                                <button id="{{'comment-edit-'.$comment->id }}" type="button"
                                        class="close btn-delete-comment"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Edit or Delete Comment"><span
                                            aria-hidden="true"><i class="fa fa-pencil"></i></span></button>
                                @endif
                                <div class="media" id="comment-{{$comment->id}}">
                                    <div class="media-left">
                                        @if (Storage::disk('public')->exists("img/avatars/avatar_" . $comment->user_id . ".jpg"))
                                            {{  Html::image(Storage::url("img/avatars/avatar_" . $comment->user_id . ".jpg") ,'profile' ,array('width'=>64, 'height'=>64))  }}

                                        @else
                                            {{  Html::image('img/doge-profile.jpg','profile',array('width'=>64, 'height'=>64))  }}

                                        @endif
                                    </div>
                                    <div class="media-body display-comment">
                                        <h4 class="media-heading">
                                            <p><a class="user-name"
                                                  href="{{ '/users/'.$comment->user_id }}">{{ $comment->user->username}}</a>
                                            </p>

                                            <p>
                                                <small>{{$comment->updated_at->diffForHumans()}}</small>
                                            </p>
                                        </h4>
                                        <p style="hyphens: auto;word-break:break-word;">{{$comment->body}}</p>
                                    </div>
                                    @can('destroy', $comment)
                                    <div class="media-body edit-comment">
                                        {!! Form::open(['class' => 'form-horizontal', 'action' =>
                                        ['CommentController@update',
                                        $post,$comment]]) !!}
                                        {!! method_field('put') !!}
                                        <div>
                                            {!! Form::textarea('body', $comment->body, ['required', 'class' =>
                                            'form-control',
                                            'rows' => '3']) !!}
                                        </div>
                                        <br>

                                        <div>
                                            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                            {!! Form::open(['class' => 'form-horizontal delete-form', 'action' =>
                                            ['CommentController@destroy', $post, $comment], 'onsubmit'=>'return
                                            confirmDelete();']) !!}
                                            {!! method_field('delete') !!}
                                            {!! Form::submit('Delete Comment', ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                            <a id="{{'cancel-comment-'.$comment->id}}" class="btn btn-default cancel">Cancel</a>
                                        </div>

                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- End Comments Section -->

            <!-- Post Comments -->
            @can('store', App\Comment::class)
            <div class="panel panel-default create-comment">
                {{ Form::open(['class' => 'form-horizontal', 'action' => ['CommentController@store', $post]]) }}
                <div class="panel-body">
                    <h5>
                        <span class="user-name">{{ ucfirst(Auth::user()->name) }}</span>{{ ' @'.Auth::user()->username }}
                    </h5>
                    {{ Form::textarea('body', '', ['required', 'class' => 'form-control', 'rows' => '3', 'id' => 'form-comment', 'placeholder' => 'Write a comment...']) }}

                </div>
                <div class="panel-footer">
                    {{ Form::submit('Submit', ['class'=>'btn btn-default', 'id' => 'form-comment-submit']) }}
                </div>
                {{ Form::close() }}
            </div>
            @else
                <p><a href="/login">Login</a> to post your comment</p>
                @endif
                        <!-- End Post Comments -->

                <!-- Modal for likers/followers-->
                <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel"
                     id="exampleModal">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel">Users who liked this post</h4>
                            </div>
                            <div class="modal-body">
                                <div class="loader"></div>
                                <div id="userExample">
                                    <div class="media-left media-middle"></div>
                                    <div class="media-body media-middle">
                                        <h5 class="like-name">Userinformation</h5>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
        </main>
    </div>
@endsection
