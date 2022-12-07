@extends('layouts.app')
@section('content')
    <div class="post-show-window">
        <div class="post-show-panel panel-standart">
            <div class="title-post-show">
                <a href="/objects">
                    <div class="title-text-post-show-back-icon">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    </div>
                </a>
                <div class="title-text-post-show">
                    <div class="title-text-post-show-content">
                        <h1>{{ $object->id }} | {{ $object->title }}</h1>
                    </div>
                    <div class="title-icon-post">
                        <a href="/objects/{{ $object->id }}/edit"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                        {!! Form::open([
                            'action' => ['App\Http\Controllers\ObjectsController@destroy', $object->id],
                            'method' => 'DELETE',
                            'class' => 'btn',
                        ]) !!}
                        {{ Form::button('<i class="fa-solid fa-trash fa-xl"></i>', ['type' => 'submit', 'class' => 'delete-btn']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="body-content-post-show">
                <p>{{ $object->body }}</p>
            </div>
        </div>
    </div>
@endsection
