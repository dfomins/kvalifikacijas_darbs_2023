@extends('layouts.app')
@section('content')
    <div class="note_show_window">
        <div class="note_show_panel panel-standart">
            <div class="title_note_show">
                <div onclick="history.back()" class="title_text_note_show_back_icon">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                </div>
                <div class="title-text-post-show">
                    <div class="title-text-post-show-content">
                        <h1>{{ $notif->title }}</h1>
                        <p>{{ $notif->created_at->format('d-m-Y | H:i') }} || {{ $notif->user->fname }}
                            {{ $notif->user->lname }}</p>
                    </div>
                    @if (Auth::user()->role == 1)
                        <div class="title-icon-post">
                            <a href="/notifications/{{ $notif->id }}/edit"><i
                                    class="fa-solid fa-pen-to-square fa-lg"></i></a>
                            {!! Form::open([
                                'action' => ['App\Http\Controllers\NotifsController@destroy', $notif->id],
                                'method' => 'DELETE',
                                'class' => 'btn',
                            ]) !!}
                            {{ Form::button('<i class="fa-solid fa-trash fa-xl"></i>', ['type' => 'submit', 'class' => 'note_show_delete']) }}
                            {!! Form::close() !!}
                        </div>
                    @endif
                </div>
            </div>
            <div class="body-content-post-show">
                <p>{{ $notif->body }}</p>
            </div>
        </div>
    </div>
@endsection
