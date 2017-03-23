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
	<div class="jumbotron">
		<h1>{{ $post->title }}</h1>
		<h5><a class="user-name" href="{{ '/users/'.$post->user->id }}">{{ucfirst($post->user->name)}}</a> {{ '@'.$post->user->username }}</h5>
		<p>{{ $post->body }}</p>

	</div>
	<div>
		<button class="btn btn-default"><span class="fa fa-thumbs-up"></span>{{' Like | 199'}}</button>
		<div id="tags-container" class="hidden-xs">
			<a class="btn btn-success btn-xs" href="">Idea</a>
			<a class="btn btn-info btn-xs" href="">Web Development</a>
			<a class="btn btn-warning btn-xs" href="">Environment Conservation</a>
		</div>
	</div>

</div> <!-- posts -->

<div>
	<h3>{{'Comments ('.$post->comments_count.')'}}</h3>
	@if($post->comments_count <= 0)
	<p>No comments</p>
	@else
	@foreach($post->comments as $comment)
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="media comment-{{$comment->id}}">
				<div class="media-left">
					<a href="#">
						<img class="media-object img-circle" src="https://placehold.it/64x64" alt="profile-pic">
					</a>
				</div>
				<div class="media-body">
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
@can('create', App\Comment::class)
<div class="panel panel-default">
	{{ Form::open(['class' => 'form-horizontal', 'action' => ['CommentController@store', $post]]) }}
	<div class="panel-body">
		<h5><span class="user-name">{{ ucfirst(Auth::user()->name) }}</span>{{ ' @'.Auth::user()->username }}</h5>
		{{ Form::textarea('body', '', ['class' => 'form-control', 'rows' => '3', 'id' => 'form-comment', 'placeholder' => 'Write a comment...']) }}
	</div>
	<div class="panel-footer">
		{{ Form::submit('Submit', ['class'=>'btn btn-default', 'id' => 'form-comment-submit']) }}
	</div>

	{{ Form::close() }}
</div>
@else
<p><a href="/login">Login</a> to post your comment</p>
@endif

@endsection