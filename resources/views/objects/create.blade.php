@extends('layouts.app')

@section('content')
    <div class="create-post-window">
        <div class="create-post-panel">
            {!! Form::open(['action' => 'App\Http\Controllers\ObjectsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', '', ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('city', 'Pilsēta') }}
                {{ Form::text('city', '', ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('street', 'Iela') }}
                {{ Form::text('street', '', ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', '', ['required', 'class' => 'form-control create-body', 'style' => 'resize: none']) }}
            </div>
            {{ Form::submit('Izveidot', ['class' => 'create-btn']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
