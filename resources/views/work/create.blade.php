@extends('layouts.app')

@section('content')
    <div class="create-post-window">
        <div class="create-post-panel">
            {!! Form::open(['action' => 'App\Http\Controllers\WorkController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('user_id', 'Darbinieka ID') }}
                {{ Form::text('user_id', '', ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('object_id', 'Objekta ID') }}
                {{ Form::text('object_id', '', ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('date', 'Datums') }}
                {{ Form::date('date', date('dd-mm-yyyy'), ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('hours', 'Stundas') }}
                {{ Form::textarea('hours', '', ['required', 'class' => 'form-control create-body', 'style' => 'resize: none']) }}
            </div>
            {{ Form::submit('Izveidot', ['class' => 'create-btn']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
