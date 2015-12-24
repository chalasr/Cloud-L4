<!DOCTYPE html>
<html>
<head>
<title>
    My CloudWac avec Laravel
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="http://localhost/Piscine_MVC_Cloud_Wac/cloud/public/css/images/favicon.ico" />
<link rel="stylesheet" href="http://cdn.chalasdev.fr/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="http://cdn.chalasdev.fr/css/bootstrap-theme.min.css" media="screen" title="no title" charset="utf-8">
{{ HTML::style('css/style.css') }}
{{ HTML::style('dropzone/css/dropzone.css') }}
</head>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><i class="icondrop fa fa-dropbox"></i><b> CloudWac</b></a>
        </div>
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        </ul>
          <ul class="nav navbar-nav pull-right">
            @if(Auth::check())
              <li> <a href="{{ URL::to('upload') }}"><i class="fa fa-cloud-upload"></i> Upload</a></li>
              <li> <a href="{{ URL::to('myuploads') }}"><i class="fa fa-folder-open"></i> Mes fichiers</a></li>
              <li> <a href="{{ URL::to('cloud') }}"><i class="fa fa-cloud"></i> Cloud</a></li>
              @if(Auth::user()->role_id == 2)
                <li> <a href="{{URL::to('admin')}}"> <i class="fa fa-cog"></i> Administration</a></li>'
              @endif
              <li> <a href="{{ URL::to('/users/logout') }}">Déconnexion</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div id="content">
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif

        @yield('content')
    </div>

    <footer>
        <p>My CloudWac with Laravel Framework &nbsp;{chalas_r}&copy; </p>
    </footer>

    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('dropzone/dropzone.min.js') }}
    {{ HTML::script('js/script.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>
