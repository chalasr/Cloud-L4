<!DOCTYPE html>
<html>
<head>
<title>
    My CloudWac avec Laravel
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="http://localhost/Piscine_MVC_Cloud_Wac/cloud/public/css/images/favicon.ico" />
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('dropzone/css/dropzone.css') }}
</head>
<body>
<header class="nav sub-menu menu">
    <nav class="container">
        <ul class="menulist list-unstyled">
            <li class="accueil"><a href="{{ URL::to('upload') }}"><i class="icondrop fa fa-dropbox"></i><b> CloudWac</b></a></li>
            <li> <i class="iconup fa fa-cloud-upload"></i> <a href="{{ URL::to('upload') }}">Upload</a></li>
            <li> <i class="iconup fa fa-folder-open"></i> <a href="{{ URL::to('myuploads') }}">Mes fichiers</a></li>
            <li> <i class="iconup fa fa-cloud"></i> <a href="{{ URL::to('cloud') }}">Cloud</a></li>
            @if(Auth::check())
                <?php if(Auth::user()->role_id == 2) echo '<li> <i class="iconup fa fa-cog"></i> <a href="'.URL::to('admin').'">Administration</a></li>'; ?>
            @endif
        </ul>
    </nav>
        @if(Auth::check())
            <?php $url = action('UsersController@getLogout'); ?>
            <?php $pseudo = Auth::user()->username; ?>
           <div><p class="login-bouton info-user"><span style="color: #FFF;">Bienvenue <?php echo $pseudo; ?></span><a class="btn btn-default btn-sm" href="<?php echo $url; ?>">Se déconnecter</a></p></div>
        @endif
    </header>

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
