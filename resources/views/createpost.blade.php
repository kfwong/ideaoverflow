@extends('template')

@section('page-title', 'Ideaoverflow')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
    {{ Html::style('css/posts.css') }}
@endsection

@section('script')
    <script type="text/javascript">
        if ($(window).width() < 768) {
            $('.btn-group').addClass('btn-group-justified');
        }
        $(window).resize(function () {
            if ($(window).width() < 768) {
                $('.btn-group').addClass('btn-group-justified');
            }
            else {
                $('.btn-group').removeClass('btn-group-justified');
            }
        });
    </script>
@endsection

@section('content')

    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">

            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            <div class="createpostidea">
                <h1>Create a New Post</h1>

                @if(isset($post))
                    {!! Form::model($post, ['route' => ['posts.update', $post->id]]) !!}
                    {!! method_field('patch') !!}
                @else
                    {!! Form::open(['route' => ['posts.store']]) !!}
                @endif

                <div class="form-group">


                    <div class="btn-group btn-group-sm" data-toggle="buttons">
                        <label class="btn btn-default {{(isset($post) && ($post->tags->first())['name'] == 'Idea')? 'active': '' }}">
                            {!! Form::radio('type', 'Idea', true) !!} Idea
                        </label>
                        <label class="btn btn-default {{(isset($post) && ($post->tags->first())['name'] == 'Problem')? 'active': '' }}">
                            {!! Form::radio('type', 'Problem') !!} Problem
                        </label>
                        <label class="btn btn-default {{(isset($post) && ($post->tags->first())['name'] == 'Project')? 'active': '' }}">
                            {!! Form::radio('type', 'Project') !!} Project
                        </label>
                    </div>


                </div>

                <div class="form-group">
                    {!! Form::label('Title') !!}
                    {!! Form::text('title', null,
                    ['required',
                    'class'=>'form-control',
                    'placeholder'=>'Post Title']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Post Body') !!}
                    {!! Form::textarea('body', null,
                    ['required',
                    'class'=>'form-control',
                    'placeholder'=>'Post Body']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Post it!',
                    ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </main>
    </div>

@endsection
