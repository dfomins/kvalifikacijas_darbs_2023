@extends('layouts.app')

@section('content')
    <div class="note_window">
        <div class="note_panel panel-standart">
            <div class="title">
                <h2>Informācija par objektiem</h2>
            </div>
            <div class="object_thread_panel">
                <ol>
                    @if (count($objects) > 0)
                        @foreach ($objects as $object)
                            <li class="object_note_row">
                                <div class="object_index_image">
                                    <img src="{{ asset('img/objects/' . $object->object_img) }}" alt="Objekta bilde">
                                </div>
                                <div class="object_note_post"><a href="/objects/{{ $object->id }}">
                                        <h3>{{ $object->id }} | {{ $object->title }}</h3>
                                    </a>
                                </div>
                        @endforeach
                    @else
                        <p style="text-align: center">Informācijas par objektiem nav</p>
                        </li>
                    @endif
                </ol>
            </div>
            @if (Auth::user()->role == 1)
                <div class="create_note_btn">
                    <a href="/objects/create"><button>Izveidot jaunu</button></a>
                </div>
            @endif
        </div>
    </div>
@endsection
