@extends('layouts.admin')

@section('content')
<div class="well logform">
    <p>Cocher la case pour bloquer l'utilisateur :</p>
    {{Form::open()}}
    <br>
    <div class="public">
        {{ Form::label('email', 'Bloqué') }}<br>
        {{ Form::checkbox('role_id', 0, false,  array('class'=>'checkshare input-block-level')) }}
    </div>
    <div class="public">
        {{ Form::label('email', 'Utilisateur') }}<br>
        {{ Form::checkbox('role_id', 1, array('class'=>'input-block-level')) }}
    </div>
    <div class="public">
        {{ Form::label('email', 'Administrateur') }}<br>
        {{ Form::checkbox('role_id', 2, false, array('class'=>'checkshare input-block-level')) }}
    </div>
    <br>
    {{ Form::submit('Valider', array('class'=>'sharesub btn btn-primary')) }}
    {{Form::close()}}
</div>
@stop