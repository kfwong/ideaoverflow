@extends('template')

@section('page-title', 'Ideaoverflow: Forbidden')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')
<div class="text-center">
	<h1>Forbidden! (403 Error)</h1>
	<p>You do not have permission to access this page. </p>
	{{  Html::image('img/NoRights.jpg')  }}
</div>

@endsection