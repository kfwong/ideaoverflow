@extends('template')

@section('page-title', 'Edit Profile')

@section('content-title','Ideaoverflow')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')
    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">
            <div class="row">
                <div class="col-xs-12">
                    @include('userprofile.usereditform')
                </div>
            </div>
        </main>
    </div>
@endsection
