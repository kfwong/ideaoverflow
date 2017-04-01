@extends('template')

@section('page-title', 'Ideaoverflow')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
{{ Html::style('css/posts.css') }}
@endsection

@section('script')

@endsection

@section('content')

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

    <label class="radio-inline">{!! Form::radio('type', 'Idea', true) !!} Idea</label>
    <label class="radio-inline">{!! Form::radio('type', 'Problem') !!} Problem</label>
    <label class="radio-inline">{!! Form::radio('type', 'Project') !!} Project</label>



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

@endsection
