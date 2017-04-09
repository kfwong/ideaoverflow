@extends('template')

@section('page-title', "User $user->username")

@section('content-title','Ideaoverflow')

@section('stylesheet')
    {{Html::style('css/tabs.css')}}
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
                <div class="col-sm-3 hidden-xs">
                    @include('userprofile.usermaster')
                    @can('update', $user)
                    <div>
                        <a class="btn btn-primary" href="/users/{{$user->id}}/edit">Edit Profile</a>
                    </div>
                    @endcan
                </div>

                <div class="col-xs-12 col-sm-9 ">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                      <a href="#posts" aria-controls="posts" role="tab" data-toggle="tab">
                        Posts
                    </a>
                  </li>
                        <li role="presentation">
                      <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                        Comments
                    </a>  
                </ul>
                </div>

                <div class="col-xs-12 col-sm-9 tab-content">
                    <div role="tabpanel" class="tab-pane active" id="posts">
                        @include('userprofile.usercontents')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="comments">
                        @include('userprofile.usercomments')
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
