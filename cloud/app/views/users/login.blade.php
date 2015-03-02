@extends('layouts.master')

@section('content')
<div class="well logform">
    {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">Connexion</h2>

        {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}

        {{ Form::submit('Se connecter', array('class'=>'btn btn-primary'))}}
    {{ Form::close() }}
</div>
@stop