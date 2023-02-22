@extends('layouts.app')

@section('content')
    <div class="note_window">
        <div class="note_panel panel-standart">
            <div class="title">
                <h2>Paziņojumi</h2>
            </div>
            <div class="thread_panel">
                <ol>
                    @if (count($notifs) > 0)
                        @foreach ($notifs as $notif)
                            <li class="note_row">
                                <div class="note_post"><a href="/notifications/{{ $notif->id }}">
                                        <h3>{{ $notif->title }}</h3>
                                        <p class="timestamp">Izveidots: {{ $notif->created_at->format('d-m-Y') }}</p>
                                    </a>
                                </div>
                        @endforeach
                    @else
                        <p style="text-align: center">Paziņojumu nav</p>
                        </li>
                    @endif
                </ol>
            </div>
            @if (Auth::user()->role == 1)
                <div class="create_note_btn">
                    <a href="/notifications/create"><button>Izveidot jaunu</button></a>
                </div>
            @endif
        </div>
    </div>
@endsection
