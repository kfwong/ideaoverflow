<div >
	
	<h3 class="text-center">Posts</h3>

	<br>

</div>

<div >

	@foreach($user->posts as $post)
	
	<article>
		
	<a href="/posts/{{$post->id}}"><h4>{{$post->title}}</h4></a>
	
    <p>Created: {{$post->created_at->toFormattedDateString()}}
        <span class="pull-right">Last updated: {{ $post->updated_at->toFormattedDateString() }}</span>
    </p>

	<p>{{$post->body}}</p>
	
	<hr/>

	</article>

	@endforeach

</div>
