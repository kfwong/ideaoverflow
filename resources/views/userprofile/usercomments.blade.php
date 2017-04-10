<div >
	
	<h3 class="text-center">{{ $user->name . "'s " }} comments</h3>

	<br>

</div>

<div class="container-fluid">

	@foreach($user->comments as $comment)
    <div class="row">    
	<article>

    <div class="col-xs-12">
        <p><b>{{$comment->created_at->toFormattedDateString()}} </b> in <a href="/posts/{{$comment->post->id}}">{{$comment->post->title}}</a></p>
    </div>

    <div class="col-xs-12">
        <p>{!! clean($comment->body) !!} </p>
        <br>
    </div>

    </article>
    </div>
	@endforeach

</div>