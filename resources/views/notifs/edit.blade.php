@extends('layouts.app')

@section('content')
    <div class="note_edit_page_window">
        <div class="note_edit_panel panel-standart">
            <div class="note_edit_button_back">
                <button onclick="history.back()">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                </button>
            </div>
            <div class="note_edit_title">
                <h3>Rediģēt piezīmi #{{ $notif->id }}</h3>
            </div>
            <div class="note_edit_form">
                {!! Form::open(['action' => ['App\Http\Controllers\NotifsController@update', $notif->id], 'method' => 'PUT']) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', $notif->title, ['required']) }}
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', $notif->body, ['required']) }}
                {{ Form::submit('Apstiprināt', ['class' => 'note_edit_submit_button']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
