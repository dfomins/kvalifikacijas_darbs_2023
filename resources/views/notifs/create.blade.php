@extends('layouts.app')

@section('content')
    <div class="note_create_page_window panel-standart">
        <div class="note_create_panel">
            <div class="note_create_button_back">
                <a href="{{ route('notifications') }}">
                    <button>
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
            </div>
            <div class="note_create_title">
                <h3>Izveidot jaunu paziņojumu</h3>
            </div>
            <div class="note_create_form">
                {!! Form::open(['action' => 'App\Http\Controllers\NotifsController@store', 'method' => 'POST']) !!}
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', '') }}
                <span class="error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', '') }}
                <span class="error">
                    @error('body')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::submit('Izveidot', ['class' => 'note_create_submit_button']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
