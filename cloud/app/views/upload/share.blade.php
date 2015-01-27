@extends('layouts.master')

@section('content')
<div class="well logform">
    <p>Cocher la case pour partager ou restreindre l'accès au fichier :</p>
    {{Form::open()}}
    <br>
    <div style="float:left;" class="public">
        {{ Form::label('email', 'Public') }}<br>
        {{ Form::checkbox('status', 1, array('class'=>'checkshare input-block-level')) }}
    </div>
    <div style="float:right;" class="public">
        {{ Form::label('email', 'Privé') }}<br>
        {{ Form::checkbox('status', 0, false, array('class'=>'checkshare input-block-level')) }}
    </div>
    <br>
    {{ Form::submit('Valider', array('class'=>'sharesub btn btn-primary')) }}
    {{Form::close()}}
</div>
@stop