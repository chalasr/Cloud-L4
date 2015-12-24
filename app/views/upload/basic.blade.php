@extends('layouts.master')

@section('content')
    <div class="body-complete">
        <p class="espace">Espace utilisé :  <span id="totalSize">{{ $size }}</span> / 50 Mio </p>
        {{Form::open(array('url' => 'upload', 'action' => 'UploadsController@upload', 'class' => 'dropzone formupload', 'id' => 'my-dropzone'))}}
        {{Form::close()}}
        <h1>DROP FILES HERE &nbsp; <b>OR</b> &nbsp; CLICK FOR BROWSE <i class="iconup fa fa-cloud-upload"></i></h1>
    </div>
@stop