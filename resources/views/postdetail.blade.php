@extends('template')

@section('page-title', $post->title )

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
{{ Html::style('css/posts.css') }}
@endsection

@section('script')
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/salvattore/1.0.9/salvattore.min.js') }}
<script type="text/javascript" src="{{ asset('js/likebutton.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
    $(document).ready(function($) {
        $('.btn-delete-comment').click(function(event) {
            $('.create-comment').hide();
            event.currentTarget.hidden = true;
            comment_id = event.currentTarget.id.substring(13);
            var form = $("<form class='media-body'></form>");
            form.append('<div class="form-group"><textarea class="form-control" rows="3"></textarea></div>');
            var div = $('<div></div>')
            div.append('<button type="submit" class="btn btn-primary">Edit Comment</button> ');
            div.append('<button class="btn btn-danger">Delete Comment</button>');
            div.append('<a id="cancel-comment-'+ comment_id +'" class="btn btn-default cancel">Cancel</a>');
            form.append(div);
            $('#comment-' + comment_id + ' div.media-body').hide();
            $('#comment-' + comment_id).append(form);

            $('.cancel').click(function(event) {
            comment_id = event.currentTarget.id.substring(15);
            $('#comment-' + comment_id + ' div.media-body').show();
            $('form.media-body').hide();
            $('#comment-edit-' + comment_id).show();
            console.log(comment_id);
        });
        });


    });
    
</script>
@endsection

@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    {{ Session::get('message') }}
</div>
@endif

<div class="posts">
    <div class="jumbotron">
        <h1>{{ $post->title }}</h1>
        <h5>
            <p>
                by {{ucfirst($post->user->name)}} <a href="{{ '/users/'.$post->user->id }}">{{ '@'. $post->user->username }}</a>
            </p>
        </h5>
        <p>{{ $post->body }}</p>

    </div>
    <div>                    
        <button class="btn btn-default btn-sm btn-like" data-post-id="{{ $post->id }}" @cannot('like', App\Post::class) {{ 'disabled' }} @endcannot >
            <span class="fa fa-thumbs-up"></span> Like <span class="badge likes-count">{{$post->likes_count}}</span>
        </button>
        <div id="tags-container" class="hidden-xs">
            <a class="btn btn-success btn-xs" href="">Idea</a>
            <a class="btn btn-info btn-xs" href="">Web Development</a>
            <a class="btn btn-warning btn-xs" href="">Environment Conservation</a>
        </div>
    </div>

</div> <!-- posts -->

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
            <button id="{{'comment-edit-'.$comment->id }}" type="button" class="close btn-delete-comment" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="Edit or Delete Comment"><span aria-hidden="true"><i class="fa fa-pencil"></i></span></button>
            @endif
            <ul class="dropdown-menu dropdown-menu-right">
                <li>Hello</li>   
            </ul>
            <div class="media" id="comment-{{$comment->id}}">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-circle" src="https://placehold.it/64x64" alt="profile-pic">
                    </a>
                </div>
                <div class="media-body" >
                    <h4 class="media-heading">
                        <p><a class="user-name" href="{{ '/users/'.$comment->user->id }}">{{ $comment->user->username }}</a></p>
                        <p><small>{{$comment->created_at->diffForHumans()}}</small></p>
                    </h4>
                    <p>{{$comment->body}}</p>
                </div>
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
        <h5><span class="user-name">{{ ucfirst(Auth::user()->name) }}</span>{{ ' @'.Auth::user()->username }}</h5>
        {{ Form::textarea('body', '', ['class' => 'form-control', 'rows' => '3', 'id' => 'form-comment', 'placeholder' => 'Write a comment...']) }}
        @if ($errors->has('body'))
        <span class="help-block">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
        @endif
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


@endsection
