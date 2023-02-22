@extends('layouts.app')

@section('content')
    <div class="note_create_page_window panel-standart">
        <div class="note_create_panel">
            <div class="note_create_button_back">
                <button onclick="history.back()">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                </button>
            </div>
            <div class="note_create_form">
                {!! Form::open([
                    'action' => 'App\Http\Controllers\ObjectsController@store',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', '', ['required', 'class' => 'form-control create-title']) }}
                {{ Form::label('city', 'Pilsēta') }}
                {{ Form::text('city', '', ['required', 'class' => 'form-control create-title']) }}
                {{ Form::label('street', 'Iela') }}
                {{ Form::text('street', '', ['required', 'class' => 'form-control create-title']) }}
                {{ Form::label('body', 'Informācija') }}
                {{ Form::textarea('body', '', ['required', 'class' => 'form-control create-body', 'style' => 'resize: none']) }}
                <div class="object-img">
                    <p>{{ Form::file('object_img') }}</p>
                </div>
                {{ Form::submit('Izveidot', ['class' => 'note_create_submit_button']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
