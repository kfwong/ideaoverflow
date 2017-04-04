@extends('template')

@section('page-title', 'Ideaoverflow: Unprocessable Entity')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')
<div class="text-center">
	<h1>Uh oh! (422 Error)</h1>
	<p>The server was unable to process your request. </p>
	{{  Html::image('img/unabletoprocess.jpg')  }}
</div>

@endsection
