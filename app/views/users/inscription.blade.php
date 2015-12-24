@extends('layouts.master')

@section('content')
<div class="well logform">
    {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Inscription</h2>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
        {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
        {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
        {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
        {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
        <label>Date de naissance :</label>
        {{ Form::input('date', 'birthday', null, array('class'=>'input-block-level')) }}

        {{ Form::submit('Register', array('class'=>'btn btn-primary'))}}
    {{ Form::close() }}
</div>
    @stop