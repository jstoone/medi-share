@extends('layouts.master')

@section("content")
    <div id="files" class="row create">
        <div class="col-md-12">

            <h1>Authenticate, please</h1>
            <h4>File: {{ $file->title }}</h4>

            <hr/>

            {!! Form::open(['route' => ['files.auth', $file->id], 'method' => 'post']) !!}

            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}

            <hr/>

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            <a class="text-warning" href="{{ route('files.index') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop
