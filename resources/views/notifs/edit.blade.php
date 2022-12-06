@extends('layouts.app')

@section('content')
    <div class="create-post-window">
        <div class="create-post-panel">
            {!! Form::open(['action' => ['App\Http\Controllers\NotifsController@update', $notif->id], 'method' => 'PUT']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', $notif->title, ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', $notif->body, ['required', 'class' => 'form-control create-body', 'style' => 'resize: none']) }}
            </div>
            {{ Form::submit('Rediģēt', ['class' => 'create-btn']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
