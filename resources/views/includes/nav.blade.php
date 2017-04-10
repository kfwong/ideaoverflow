<!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/" style="margin-top: -5px;"> <div>{{ HTML::image('/img/logoblanc.png', 'logo') }} <span style="font-family: 'Jockey One', sans-serif;font-size: 18pt;">Idea<span style="font-family: 'Jockey One', sans-serif;font-size: 18pt;color:#ED7347;">Overflow</span></span></div></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right text-center">
      @if(Auth::check())
        <li>
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">Write Post <span class="fa fa-pencil-square-o"></span></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="/posts/create?postType=idea" style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">Post an idea</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/posts/create?postType=problem" style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">Post a problem</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/posts/create?postType=project" style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">Post a project</a></li>
            </ul>
          </div>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">
            {{ 'Hi, '. ucfirst(Auth::user()->name) }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/users/{{ Auth::user()->id }}" style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">View my profile</a></li>
            <li class="divider" role="separator"></li>
            <li><a href="/users/{{ Auth::user()->id }}/edit" style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">Edit my profile</a></li>
            <li class="divider" role="separator"></li>
            {{ Form::open(['url'=>'/logout']) }}
            <div class="text-center">
            <li style="font-family: 'Jockey One', sans-serif;font-size: 12pt;">{{ Form::submit('Logout', ['class' => 'btn btn-sm   btn-danger']) }}</li>
            </div>
            {{ Form::close() }}
          </ul>
        </li>
        @else
        <li><a class="btn btn-primary" href="/login" style="font-family: 'Jockey One', sans-serif;font-size: 14pt;">Login</a></li>
        <li><a class="btn btn-primary" href="/register" style="font-family: 'Jockey One', sans-serif;font-size: 14pt;">Sign Up</a></li>
        @endif
      </ul>
    </div>

  </div><!--/.container-fluid -->
</nav>
