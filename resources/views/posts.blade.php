@extends('template')

@section('page-title', 'Ideaoverflow')

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
			<h3>Post title <small><span class="label label-success">Idea</span></small></h3>
			<h5><strong>Kang Fei</strong> @kfwong</h5>
		</div>
	</div>
	<div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae perferendis sapiente provident modi, commodi itaque eaque vitae ut tempora fugit quidem facere animi iste, officia numquam maiores eum veniam accusantium!</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur aspernatur itaque atque ab, quo eius adipisci distinctio quibusdam ullam dicta et nulla, explicabo totam dolorum fugiat perspiciatis, optio praesentium dolorem. <a href="">(More)</a></p>
	</div>
	<div>
		<ul class="list-inline">
			<li><a href="">Like</a></li>
			<li><a href="">Comments</a> <span class="badge">5</span></li>
		</ul>
		
	</div> 
</div> <!-- posts -->
<div class="posts">
	<div>
		<div>
			<h3>Post title <small><span class="label label-success">Idea</span></small></h3>
			<h5><strong>Kang Fei</strong> @kfwong</h5>
		</div>
	</div>
	<div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae perferendis sapiente provident modi, commodi itaque eaque vitae ut tempora fugit quidem facere animi iste, officia numquam maiores eum veniam accusantium!</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur aspernatur itaque atque ab, quo eius adipisci distinctio quibusdam ullam dicta et nulla, explicabo totam dolorum fugiat perspiciatis, optio praesentium dolorem. <a href="">(More)</a></p>
	</div>
	<div>
		<ul class="list-inline">
			<li><a href="">Like</a></li>
			<li><a href="">Comments</a> <span class="badge">5</span></li>
		</ul>
		
	</div> 
</div> <!-- posts -->
<div class="posts">
	<div>
		<div>
			<h3>Post title <small><span class="label label-success">Idea</span></small></h3>
			<h5><strong>Kang Fei</strong> @kfwong</h5>
		</div>
	</div>
	<div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae perferendis sapiente provident modi, commodi itaque eaque vitae ut tempora fugit quidem facere animi iste, officia numquam maiores eum veniam accusantium!</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur aspernatur itaque atque ab, quo eius adipisci distinctio quibusdam ullam dicta et nulla, explicabo totam dolorum fugiat perspiciatis, optio praesentium dolorem. <a href="">(More)</a></p>
	</div>
	<div>
		<ul class="list-inline">
			<li><a href="">Like</a></li>
			<li><a href="">Comments</a> <span class="badge">5</span></li>
		</ul>
		
	</div> 
</div> <!-- posts -->

@endsection