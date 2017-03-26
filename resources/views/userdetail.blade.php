@extends('template')

@section('page-title', $user->username." (".$user->name.")")

@section('content-title','Ideaoverflow')

@section('stylesheet')

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

<div class="row">
	<div class = "col-xs-3" >
		@include('userprofile.usermaster')

		<div>
			<a class="btn btn-primary" href="/users/{{$user->id}}/edit">Edit Profile</a>
		</div>
	</div>

	<div class = "col-xs-9" >
		@include('userprofile.usercontents')
	</div>
</div>

@endsection