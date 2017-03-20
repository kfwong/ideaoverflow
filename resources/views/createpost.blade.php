@extends('template')

@section('page-title', 'Ideaoverflow')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
{{ Html::style('css/posts.css') }}
@endsection

@section('script')

@endsection

@section('content')

<div class="createpost">
<h1>Create a New Post!</h1>

{!! Form::open() !!}

<div class="form-group">
    {!! Form::label('Post title') !!}
    {!! Form::text('post_title', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Post title')) !!}
</div>

<div class="form-group">
    {!! Form::label('Idea Description') !!}
    {!! Form::textarea('idea_description', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Idea Description')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Post it!', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div> 

@endsection