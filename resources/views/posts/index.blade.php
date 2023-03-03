@extends('layouts.app')

@section('content')
    <div class="note_window panel-standart">
        <div class="note_panel">
            <h2>Privātās piezīmes</h2>
            <div class="thread_panel">
                <ol>
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <li class="note_row">
                                <div class="note_post"><a href="{{ route('posts') }}/{{ $post->id }}">
                                        <h3>{{ $post->title }}</h3>
                                        <p class="timestamp">Izveidota: {{ $post->created_at->format('d-m-Y') }}</p>
                                    </a>
                                </div>
                        @endforeach
                    @else
                        <p style="text-align: center">Piezīmju nav</p>
                        </li>
                    @endif
                </ol>
            </div>
            <div class="create_note_btn">
                <a href="{{ route('posts') }}/jauns"><button>Izveidot jaunu</button></a>
            </div>
        </div>
    </div>
@endsection
