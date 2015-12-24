<!DOCTYPE html>
<html>
<head>
<title>
    My CloudWac with Laravel
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="http://localhost/Piscine_MVC_Cloud_Wac/cloud/public/css/images/favicon.ico" />
<link rel="stylesheet" href="http://cdn.chalasdev.fr/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="http://cdn.chalasdev.fr/css/bootstrap-theme.min.css" media="screen" title="no title" charset="utf-8">
{{ HTML::style('css/style.css') }}
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
        <li>{{ HTML::link('users/register', 'Inscription') }}</li>
        <li>{{ HTML::link('users/login', 'Connexion') }}</li>
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
        <p> My CloudWac with Laravel Framework &nbsp;{chalas_r}&copy; </p>
    </footer>
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/script.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>
