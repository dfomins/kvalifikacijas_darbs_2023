@extends('layouts.app')

@section('content')
    <div class="note_edit_page_window panel-standart">
        <div class="note_edit_panel">
            <div class="note_edit_button_back">
                <button onclick="history.back()">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                </button>
            </div>
            <div class="note_edit_title">
                <h3>Rediģēt piezīmi #{{ $post->id }}</h3>
            </div>
            <div class="note_edit_form">
                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'PUT']) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', $post->title, ['required']) }}
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', $post->body, ['required']) }}
                {{ Form::submit('Apstiprināt', ['class' => 'note_edit_submit_button']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
