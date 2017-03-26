@extends('template')

@section('page-title', 'Ideaoverflow')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
{{ Html::style('css/posts.css') }}
@endsection

@section('script')

@endsection

@section('content')

<div class="createpostidea">
<h1>Create a New {{$type}} !</h1>

{!! Form::open(['class' => 'form-horizontal', 'action' => ['PostController@store']]) !!}

<div class="form-group">
    {!! Form::label($type.' title') !!}
    {!! Form::text('post_title', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>$type.' title')) !!}
</div>

<div class="form-group">
    {!! Form::label($type.' description') !!}
    {!! Form::textarea('post_description', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>$type.' description')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Post it!', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div> 

@endsection
