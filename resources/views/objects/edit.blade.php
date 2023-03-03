@extends('layouts.app')

@section('content')
    <div class="object_edit_page_window panel-standart">
        <div class="object_edit_panel">
            <div class="object_edit_button_back">
                <button onclick="history.back()">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                </button>
            </div>
            <div class="object_edit_form">
                {!! Form::open([
                    'action' => ['App\Http\Controllers\ObjectsController@update', $object->id],
                    'method' => 'PUT',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', $object->title, ['required']) }}
                {{ Form::label('city', 'Pilsēta') }}
                {{ Form::text('city', $object->city, ['required']) }}
                {{ Form::label('street', 'Iela') }}
                {{ Form::text('street', $object->street, ['required']) }}
                {{ Form::label('body', 'Informācija') }}
                {{ Form::textarea('body', $object->body, ['required']) }}
                {{ Form::file('object_img') }}
                <a href="">Dzēst bildi</a>
                {{ Form::submit('Apstiprināt', ['class' => 'note_edit_submit_button']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
