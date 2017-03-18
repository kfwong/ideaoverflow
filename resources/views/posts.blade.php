@extends('template')

@section('page-title', 'Ideaoverflow')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')
{{ Html::style('css/posts.css') }}
@endsection

@section('script')

@endsection

@section('content')

@if(isset($posts))
@foreach($posts as $post)

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
			<li><button class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span> Like</button></li>
			<li><a href="{{'posts/'.$post->id}}">{{ $post->likes_count . ' Like' . ($post->likes_count > 1? 's':'')}}</a></li>
			<li><a href="{{'posts/'.$post->id}}">{{ 'Comment' . ($post->comments_count > 1? 's' : '')}}</a> <span class="badge">{{ $post->comments_count }}</span></li>
		</ul>
		
	</div> 
</div> <!-- posts -->

@endforeach
@endif

@endsection