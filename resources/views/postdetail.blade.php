@extends('template')

@section('page-title', $post->title )

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
{{ Html::style('css/posts.css') }}
@endsection

@section('script')

@endsection

@section('content')

<div class="posts">
	<div>
		<div>
			<h3><a class="post-title" href="{{'posts/'.$post->id}}">{{ $post->title }}</a> <small><a href="" class="{{'post-tag '.$post->tag.'-tag'}}">{{ ucfirst($post->tag) }}</a></small></h3>
			<h5><a class="user-name" href="{{ 'users/'.$post->user->id }}">{{$post->user->name}}</a> {{ '@'.$post->user->username }}</h5>
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
				<h5><a class="user-name" href="{{ 'users/'.$comment->user->id }}">{{$comment->user->name}}</a> {{ '@'.$comment->user->username }}</h5>
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

@endsection