@extends('template')

@section('page-title', 'Ideaoverflow')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
    {{ Html::style('css/gallery.prefixed.css') }}
    {{ Html::style('css/posts.css') }}
    {{ Html::style('css/search.css') }}
    {{ Html::style('https://fonts.googleapis.com/css?family=Jockey+One') }}
    {{ Html::style('https://fonts.googleapis.com/css?family=Spinnaker') }}
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

        body {
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

        figure h1 {
            font-family: 'Jockey One', sans-serif !important;
            color: #ED7347;
            margin-top: 100px;
            font-size: 4em;
        }

        figure p {
            color: white;
            font-size: 2em;
        }
    </style>
@endsection

@section('script')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/salvattore/1.0.9/salvattore.min.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js') }}
    {{ Html::script('js/parallax.min.js') }}
    {{ Html::script('js/likebutton.js') }}
    {{ Html::script('js/jquery-ias.min.js') }}
    {{ Html::script('js/search.js') }}
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
                <div class="col-md-12">
                    <!--<img class="img-fluid" src="/img/creative-idea.png" style="max-width: 100%;margin-top:100px;"/>-->
                    <div class="gallery items-5 autoplay" style="margin-top:100px">
                        <figure class="item">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-3">
                                    <img src="/img/brainstorming.png"/>
                                </div>
                                <div class="col-md-6 hidden-xs" style="text-align: left;">
                                    <h1>Brainstorming for Hackathon?</h1>

                                    <p style="font-family: 'Spinnaker', sans-serif;">Ideaoverflow is the creativity hub that saves you from the grind of finding
                                        inspiration.</p>
                                </div>
                            </div>
                        </figure>

                        <figure class="item">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-3">
                                    <img src="/img/market-research.png"/>
                                </div>
                                <div class="col-md-6 hidden-xs" style="text-align: left;">
                                    <h1>Marketing Research</h1>

                                    <p style="font-family: 'Spinnaker', sans-serif;">Illustrate your brilliant concept to potential customers and get free, heartfelt
                                        feedback.</p>
                                </div>
                            </div>
                        </figure>

                        <figure class="item">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-3">
                                    <img src="/img/portfolio.png"/>
                                </div>
                                <div class="col-md-6 hidden-xs" style="text-align: left;">
                                    <h1>Portfolio Showcase</h1>

                                    <p style="font-family: 'Spinnaker', sans-serif;">Keep your past feats alive and let them tell your stories.</p>
                                </div>
                            </div>
                        </figure>

                        <figure class="item">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-3">
                                    <img src="/img/startup.png"/>
                                </div>
                                <div class="col-md-6 hidden-xs" style="text-align: left;">
                                    <h1>Startup</h1>

                                    <p style="font-family: 'Spinnaker', sans-serif;">Connect, communicate and collaborate with professionals out of your realm.</p>
                                </div>
                            </div>
                        </figure>

                        <figure class="item">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-4">
                                    <img src="/img/success-stories.png"/>
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    <h1>Share Your Success</h1>
                                    <p style="font-family: 'Spinnaker', sans-serif;">Nurture your ideas, record their growth, earn more community support.</p>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">
            <div class="search-field">
                <input id="searchbox" type="search" name="q" placeholder="Find your inspiration here! Start by typing any keywords or project type!" autocomplete="off">
                <button type="button" id="search">Find!</button>
                <ul class="results">

                </ul>
            </div>
            @if(isset($posts))
                <div id="posts" data-columns>
                    @foreach($posts as $post)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="modal-title">
                                    <a class="post-title" href="{{'/posts/'.$post->id}}" style="">{{ $post->title }}</a>
                                    <small>
                                        <span class="label {{'tag-'.lcfirst(($post->tags->first())['name'])}}">{{($post->tags->first())['name']}}</span>
                                    </small>
                                </h4>
                                <span class="user-name">
                                    by <a href="{{ '/users/'.$post->user['id'] }}">{{ $post->user['username'] }}</a>
                                    <span class="pull-right"> {{$post->updated_at->diffForHumans()}} </span>
                                </span>
                            </div>
                            <div class="panel-body">
                                <p style="hyphens: auto;-webkit-hyphens:auto;-moz-hyphens:auto;-ms-hyphens:auto;word-wrap: break-word;word-break:break-word;">{{ $post->body }}</p>
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
