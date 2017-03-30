@extends('template')

@section('page-title', 'Edit Profile')

@section('content-title','Ideaoverflow')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')

<div class="row">
    <div class = "col-xs-3" >
        @include('userprofile.usermaster')
    </div>

    <div class = "col-xs-9" >
        @include('userprofile.usereditform')
    </div>
</div>

@endsection
