<!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- <img src = "img/logoblanc.png" width = "65px" text_align = "center"> -->
        {{ HTML::image('img/logoblanc.png', 'logo', array( 'width' => 65, 'height' => 65 )) }}
	</div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"> Ideaoverflow </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right text-center">
      @if(Auth::check())
        <li>
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Write Post <span class="fa fa-pencil-square-o"></span></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="/posts/create">Post an idea</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/posts/create">Post a problem</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/posts/create">Post a project</a></li>
            </ul>
          </div>
        </li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            {{ 'Hi, '. ucfirst(Auth::user()->name) }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/users/{{ Auth::user()->id }}">View my profile</a></li>
            <li class="divider" role="separator"></li>
            {{ Form::open(['url'=>'/logout']) }}
            <div class="text-center">
            <li>{{ Form::submit('Logout', ['class' => 'btn btn-sm   btn-danger']) }}</li>
            </div>
            {{ Form::close() }}
          </ul>
        </li>
        @else
        <li><a href="/login">Login</a></li>
        <li><a class="btn btn-primary" href="/register">Sign Up</a></li>
        @endif
      </ul>
      <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search for posts">
      </form>
    </div>

  </div><!--/.container-fluid -->
</nav>
