@extends('template')

@section('page-title', 'Ideaoverflow: Unprocessable Entity')

@section('content-title', 'Ideaoverflow')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')
    <div id="content" class="row">
        <main class="col-xs-12 col-md-offset-1 col-md-10">
            <div class="text-center">
                <h1>Uh oh! (422 Error)</h1>

                <p>The server was unable to process your request. </p>
                {{  Html::image('img/unabletoprocess.jpg')  }}
            </div>
        </main>
    </div>

@endsection
