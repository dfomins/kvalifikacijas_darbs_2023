@extends('layouts.app')

@section('content')
    <div class="note_edit_page_window panel-standart">
        <div class="note_edit_panel">
            <div class="note_edit_button_back">
                <a href="{{ route('posts') }}">
                    <button>
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
                <div class="note_edit_title">
                    <h3>Rediģēt piezīmi #{{ $post->id }}</h3>
                </div>
                <div class="note_edit_form">
                    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'PUT']) !!}
                    {{ Form::label('title', 'Nosaukums') }}
                    {{ Form::text('title', $post->title) }}
                    <span class="error">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                    {{ Form::label('body', 'Saturs') }}
                    {{ Form::textarea('body', $post->body) }}
                    <span class="error">
                        @error('body')
                            {{ $message }}
                        @enderror
                    </span>
                    {{ Form::submit('Apstiprināt', ['class' => 'note_edit_submit_button']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endsection
