@extends('layouts.app')

@section('content')
    <div class="post_edit_page_window">
        <div class="post_edit_panel panel-standart">
            <div class="post_edit_button_back">
                <button onclick="history.back()">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                </button>
            </div>
            <div class="post_edit_form">
                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'PUT']) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', $post->title, ['required']) }}
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', $post->body, ['required']) }}
                {{ Form::submit('Rediģēt', ['class' => 'create-btn']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
