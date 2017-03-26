<div >
	
	<h3>{{$user->username}}'s posts</h3>

	<br>

</div>

<div >

	@foreach($user->posts as $post)
	
	<article>
		
	<a href="/posts/{{$post->id}}"><h4>{{$post->title}}</h4></a>
	
	<p>{{$post->created_at->toFormattedDateString()}}

	<p>{{$post->body}}</p>
	
	<hr/>

	</article>

	@endforeach

</div>