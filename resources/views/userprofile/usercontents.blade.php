<div >
	
	<h3 class="text-center">{{ $user->name . "'s " }} posts</h3>

	<br>

</div>

<div class="container-fluid">

	@foreach($user->posts as $post)
    <div class="row">    
	<article>

    <div class="col-xs-12">    
        <a href="/posts/{{$post->id}}"><h3>{{$post->title}}</h3></a>
    </div>

    <div class="col-md-6">    
        <p><b>Created: {{$post->created_at->toFormattedDateString()}} </b></p>
    </div>
    <div class="col-md-6">
        <p><b>Last updated: {{ $post->updated_at->toFormattedDateString() }} </b></p>
    </div>

    <div class="col-xs-12">
        <p>{{$post->body}} </p>
        <hr>
    </div>

    </article>
    </div>
	@endforeach

</div>
