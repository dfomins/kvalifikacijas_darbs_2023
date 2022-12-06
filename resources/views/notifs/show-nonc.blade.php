@extends('layouts.app')
@section('content')
    <div class="post-show-window">
        <div class="post-show-panel panel-standart">
            <div class="title-post-show">
                <a href="/notifications">
                    <div class="title-text-post-show-back-icon">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    </div>
                </a>
                <div class="title-text-post-show">
                    <div class="title-text-post-show-content">
                        <h1>{{ $notif->title }}</h1>
                        <p>{{ $notif->created_at->format('d-m-Y | H:i') }} || {{ $notif->user->fname }}
                            {{ $notif->user->lname }}</p>
                    </div>
                </div>
            </div>
            <div class="body-content-post-show">
                <p>{{ $notif->body }}</p>
            </div>
        </div>
    </div>
@endsection
