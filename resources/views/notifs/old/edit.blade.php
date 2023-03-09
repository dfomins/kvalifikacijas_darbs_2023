@extends('layouts.app')

@section('content')
    <div class="note_edit_page_window panel-standart">
        <div class="note_edit_panel">
            <div class="note_edit_button_back">
                <a href="{{ route('notifications') }}">
                    <button>
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
            </div>
            <div class="note_edit_title">
                <h3>Rediģēt paziņojumu #{{ $notif->id }}</h3>
            </div>
            <div class="note_edit_form">
                {!! Form::open(['action' => ['App\Http\Controllers\NotifsController@update', $notif->id], 'method' => 'PUT']) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', $notif->title) }}
                <span class="error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', $notif->body) }}
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
