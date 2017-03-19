@extends('template')

@section('page-title', $post->title )

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
{{ Html::style('css/posts.css') }}
@endsection

@section('script')

@endsection

@section('content')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissable fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	{{ Session::get('message') }}
</div>
@endif

<div class="posts">
	<div>
		<div>
			<h3>{{ $post->title }} <small><a href="" class="{{'post-tag '.$post->tag.'-tag'}}">{{ ucfirst($post->tag) }}</a></small></h3>
			<h5><a class="user-name" href="{{ '/users/'.$post->user->id }}">{{ucfirst($post->user->name)}}</a> {{ '@'.$post->user->username }}</h5>
		</div>
	</div>
	<div>
		<p>{{ $post->description }}</p>
	</div>
	<div>
		<ul class="list-inline">
			<li><button class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span>{{' Like | '.$post->likes_count}}</button></li>
			<li>{{ $post->tags }}</li>
		</ul>
		
	</div> 
</div> <!-- posts -->

<div>
	<h3>{{'Comments ('.$post->comments_count.')'}}</h3>
	@if($post->comments_count > 0)
	@foreach($post->comments as $comment) 
	<div class="comment">
		<div>
			<h5><a class="user-name" href="{{ '/users/'.$comment->user->id }}">{{ucfirst($comment->user->name)}}</a> {{ '@'.$comment->user->username }}</h5>
		</div>
		<div>
			<p>{{$comment->description}}</p>
		</div>
	</div>
	@endforeach
	@else
	<p>No comments</p>
	@endif
</div>

<div id="form-comment-container">
	<h5><span class="user-name">{{ ucfirst(Auth::user()->name) }}</span>{{ ' @'.Auth::user()->username }}</h5>
	{{ Form::open(['class' => 'form-inline', 'action' => ['PostCommentController@store', $post->id]]) }}
	<div class="form-group">
		{{ Form::textarea('description', '', ['class' => 'form-control', 'rows' => '3', 'id' => 'form-comment', 'placeholder' => 'Write a comment...']) }}
		{{ Form::submit('Submit', ['class'=>'btn btn-default', 'id' => 'form-comment-submit']) }}
	</div>
	{{ Form::close() }}
</div>

@endsection