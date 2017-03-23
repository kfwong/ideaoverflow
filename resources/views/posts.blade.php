@extends('template')

@section('page-title', 'Ideaoverflow')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
    {{ Html::style('css/posts.css') }}
    <style>
        /* Base styles */
        .column {
            float: left;
        }
        .size-1of4 {
            width: 25%;
            padding: 10px;
        }
        .size-1of3 {
            width: 33.333%;
            padding: 10px;
        }
        .size-1of2 {
            width: 50%;
            padding: 10px;
        }

        /* Configurate salvattore with media queries */
        @media screen and (max-width: 450px) {
            #posts[data-columns]::before {
                content: '1 .column';
            }
        }

        @media screen and (min-width: 451px) and (max-width: 700px) {
            #posts[data-columns]::before {
                content: '2 .column.size-1of2';
            }
        }

        @media screen and (min-width: 701px) {
            #posts[data-columns]::before {
                content: '3 .column.size-1of3';
            }
        }
    </style>
@endsection

@section('script')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/salvattore/1.0.9/salvattore.min.js') }}
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-like').on('click', function(){
                var target = $(this);
                $.ajax({
                    url: '/posts/'+$(this).data('post-id')+'/like',
                    type: 'POST',
                    data: {_token: "CSRF_TOKEN"}, //todo!!!
                    dataType: 'JSON',
                    success: function (data) {
                        target.find('.likes-count').text(data.likes_count);
                    }
                });
            });
        });
    </script>
@endsection

@section('content')

@if(isset($posts))
    <div id="posts" data-columns>
        @foreach($posts as $post)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="modal-title">
                        <a class="post-title" href="{{'/posts/'.$post->id}}">{{ $post->title }}</a>
                        <small>
                            <a href="" class="btn btn-success btn-xs">Idea</a>
                        </small>
                    </h4>
                    <a class="user-name" href="{{ '/users/'.$post->user['id'] }}">{{ $post->user['username'] }} @ {{$post->created_at->diffForHumans()}}</a>
                </div>
                <div class="panel-body">
                    <p>{{ $post->body }}</p>
                </div>

                <div class="panel-footer">
                    <button class="btn btn-default btn-sm btn-like" data-post-id="{{$post->id}}"><span class="fa fa-thumbs-up"></span> Like <span class="badge likes-count">{{$post->likes_count}}</span></button>
                    <small class="pull-right" style="padding: 8px 0px 8px 0px"><a href="{{'/posts/'.$post->id}}">{{ $post->comments_count . ' Comment' . ($post->comments_count > 1? 's' : '')}}</a></small>
                </div>
            </div>

        @endforeach
    </div>
@endif

@endsection