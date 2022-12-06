@extends('layouts.app')

@section('content')
    <div class="note-window">
        <div class="note-panel panel-standart">
            <div class="title">
                <h2>Privātās piezīmes</h2>
            </div>
            <div class="threads">
                <ol>
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <li class="row">
                                <div class="title-text-post">
                                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                                    <p class="timestamp">Izveidots: {{ $post->created_at->format('d-m-Y') }}</p>
                                </div>
                        @endforeach
                    @else
                        <p style="text-align: center">Piezīmju nav</p>
                        </li>
                    @endif
                </ol>
            </div>
            <a href="/posts/create" id="btn"><input type="button" name="button" value="Izveidot jaunu"
                    id="btn" /></a>
        </div>
    </div>
@endsection
