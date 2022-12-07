@extends('layouts.app')

@section('content')
    <div class="create-post-window">
        <div class="create-post-panel">
            {!! Form::open(['action' => ['App\Http\Controllers\ObjectsController@update', $object->id], 'method' => 'PUT']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', $object->title, ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('city', 'Pilsēta') }}
                {{ Form::text('city', $object->city, ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('street', 'Iela') }}
                {{ Form::text('street', $object->street, ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Informācija') }}
                {{ Form::textarea('body', $object->body, ['required', 'class' => 'form-control create-body', 'style' => 'resize: none']) }}
            </div>
            {{ Form::submit('Rediģēt', ['class' => 'create-btn']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
