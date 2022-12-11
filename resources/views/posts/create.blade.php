@extends('layouts.app')

@section('content')
    <div class="create-post-window">
        <div class="create-post-panel">
            {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Nosaukums') }}
                {{ Form::text('title', '', ['class' => 'form-control create-title']) }}
            </div>
            <span style="color: red">
                @error('title')
                    {{ $message }}
                @enderror
            </span>
            <div class="form-group">
                {{ Form::label('body', 'Saturs') }}
                {{ Form::textarea('body', '', ['class' => 'form-control create-body', 'style' => 'resize: none']) }}
            </div>
            <span style="color: red">
                @error('body')
                    {{ $message }}
                @enderror
            </span>
            {{ Form::submit('Izveidot', ['class' => 'create-btn']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
