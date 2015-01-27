@extends('layouts.master')

@section('content')
<div class="well logform">
    {{Form::open()}}
    {{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=> $upload->name)) }}
    {{ Form::submit('Renommer', array('class'=>'btn btn-primary'))}}
    {{Form::close()}}
</div>
@stop