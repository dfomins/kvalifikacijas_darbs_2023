@extends('layouts.app')
@section('content')
    <div class="object_show_window">
        <div class="object_show_panel panel-standart">
            <div class="title_note_show">
                <a href="/objects">
                    <div class="title_text_note_show_back_icon">
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
                        {{ Form::button('<i class="fa-solid fa-trash fa-xl"></i>', ['type' => 'submit', 'class' => 'note_show_delete']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="body-content-post-show">
                {{-- <span style="width: 300px; background: url({{ asset('uploads/objects/' . $object->object_img) }})"> --}}
                @if ($object->object_img != null)
                    <div class="object_show_image">
                        <img src="{{ asset('img/objects/' . $object->object_img) }}" alt="Objekta bilde">
                    </div>
                @endif
                {{-- </span> --}}
                <p style="text-align: justify;">{{ $object->body }}</p>
            </div>
        </div>
    </div>
@endsection
