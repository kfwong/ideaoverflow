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

        body{
            background-color: #096180 !important;
        }

        .panel {
            animation-name: fly;
            animation-duration: 1s;

            -moz-animation-name: fly;
            -moz-animation-duration: 1s;

            -webkit-animation-name: fly;
            -webkit-animation-duration: 1s;
        }

        @-webkit-keyframes fly {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @-moz-keyframes fly {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fly {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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
/*
        .parallax-mirror {
            margin-top: 50px;
            left: 0 !important;
            width: 100% !important;
            background-color: #096180;
        }
*/
        #parallax-section-1 {
            background: transparent;
        }
    </style>
@endsection

@section('script')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/salvattore/1.0.9/salvattore.min.js') }}
    {{ Html::script('js/parallax.min.js') }}
    {{ Html::script('js/likebutton.js') }}
    {{ Html::script('js/jquery-ias.min.js') }}
    <script>
        $(document).ready(function () {
            var ias = $.ias({
                container: "#posts",
                item: ".panel",
                pagination: "#pagination",
                next: "#next"
            });

            ias.on('render', function (items) {
                var grid = document.querySelector('#posts');

                salvattore.appendElements(grid, items);

                return false;
            });

            $('#parallax-section-1').parallax();
        });
    </script>
@endsection

@section('content')


    <div id="parallax-section-1" data-parallax="scroll" data-position="top" data-natural-width="600"
         data-natural-height="400" data-bleed="100" style="height:400px;">
        <div class="parallax-slider">
            <div class="row">
                <div class="col-sm-2 col-md-4">
                    <img class="img-fluid" src="/img/creative-idea.png" style="max-width: 100%;margin-top:100px;"/>
                </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>
    </div>

    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">
            @if(isset($posts))
                <div id="posts" data-columns>
                    @foreach($posts as $post)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="modal-title">
                                    <a class="post-title" href="{{'/posts/'.$post->id}}">{{ $post->title }}</a>
                                    <small>
                                        <span class="label label-info">Idea</span>
                                    </small>
                                </h4>
                                <span class="user-name">
                                    by <a href="{{ '/users/'.$post->user['id'] }}">{{ $post->user['username'] }}</a>
                                    <span class="pull-right"> {{$post->created_at->diffForHumans()}} </span>
                                </span>
                            </div>
                            <div class="panel-body">
                                <p>{{ $post->body }}</p>
                            </div>

                            <div class="panel-footer">
                                <button class="btn btn-{{(count($post->likes) > 0)? 'primary':'default'}} btn-sm btn-like"
                                        data-post-id="{{$post->id}}" @cannot('like', App\Post::class) {{ 'disabled' }} @endcannot >
                                    <span class="fa fa-thumbs-up"></span> <span
                                            class="like-state">{{(count($post->likes) > 0)? 'Liked ':'Like ' }}</span><span
                                            class="badge likes-count">{{$post->likes_count}}</span>
                                </button>
                                <small class="pull-right" style="padding: 8px 0px 8px 0px"><a
                                            href="{{'/posts/'. $post->id .'/#comments'}}">{{ $post->comments_count . ' Comments' }}</a>
                                </small>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="pagination">
                            <a id="next" href="{{$posts->nextPageUrl()}}">More...</a>
                        </div>
                    </div>
                </div>
            @endif
        </main>
    </div>

@endsection
