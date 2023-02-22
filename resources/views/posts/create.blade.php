@extends('layouts.app')

@section('content')
    <div class="note_create_page_window panel-standart">
        <div class="note_create_panel">
            <div class="note_create_button_back">
                <button onclick="history.back()">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                </button>
            </div>
            <div class="note_create_title">
                <h3>Izveidot jaunu piezīmi</h3>
            </div>
            <div class="note_create_form">
                {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', '', ['required']) }}
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', '', ['required']) }}
                {{ Form::submit('Izveidot', ['class' => 'note_create_submit_button']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
