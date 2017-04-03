@extends('template')

@section('page-title', "User $user->username")

@section('content-title','Ideaoverflow')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')

    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-xs-3">
                    @include('userprofile.usermaster')
                    @can('update', $user)
                    <div>
                        <a class="btn btn-primary" href="/users/{{$user->id}}/edit">Edit Profile</a>
                    </div>
                    @endcan
                </div>

                <div class="col-xs-9">
                    @include('userprofile.usercontents')
                </div>
            </div>
        </main>
    </div>

@endsection
