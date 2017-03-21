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
			<h3>{{ $post->title }} <small><a href="" class=""></a></small></h3>
			<h5><a class="user-name" href="{{ '/users/'.$post->user->id }}">{{ucfirst($post->user->name)}}</a> {{ '@'.$post->user->username }}</h5>
		</div>
	</div>
	<div>
		<p>{{ $post->body }}</p>
	</div>
	<div>
		<ul class="list-inline">
			<li><button class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span>{{' Like | 10'}}</button></li>
		</ul>
		
	</div> 
</div> <!-- posts -->

<div>
	<h3>{{'Comments ('.$post->comments_count.')'}}</h3>
    @if($post->comments_count <= 0)
        <p>No comments</p>
    @else
        @foreach($post->comments as $comment)
        <div class="comment">
            <div>
                <h5><a class="user-name" href="{{ '/users/'.$comment->user->id }}">{{ucfirst($comment->user->name)}}</a> {{ '@'.$comment->user->username }}</h5>
            </div>
            <div>
                <p>{{$comment->content}}</p>
            </div>
        </div>
        @endforeach
    @endif
</div>

<div id="form-comment-container">

	@if(Auth::check())
        <h5><span class="user-name">{{ ucfirst(Auth::user()->name) }}</span>{{ ' @'.Auth::user()->username }}</h5>

        {{ Form::open(['class' => 'form-inline', 'action' => ['PostCommentController@store', $post]]) }}
        <div class="form-group">
            {{ Form::textarea('content', '', ['class' => 'form-control', 'rows' => '3', 'id' => 'form-comment', 'placeholder' => 'Write a comment...']) }}
            {{ Form::submit('Submit', ['class'=>'btn btn-default', 'id' => 'form-comment-submit']) }}
        </div>
        {{ Form::close() }}
	@else
        <p><a href="/login">Login</a> to post your comment</p>
	@endif
</div>