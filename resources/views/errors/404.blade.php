@extends('template')

@section('page-title', 'Ideaoverflow: Page Not Found')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')
    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">
            <div class="text-center">
                <h1>Oops! (404 Error)</h1>

                <p>The page you are accessing cannot be found. </p>
                {{  Html::image('img/lost.jpg')  }}
            </div>
        </main>
    </div>

@endsection