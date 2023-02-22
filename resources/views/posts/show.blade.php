@extends('layouts.app')
@section('content')
    <div class="note_show_panel panel-standart">
        <div class="title_note_show">
            <a href="/posts">
                <div class="title_text_note_show_back_icon">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                </div>
            </a>
            <div class="title-text-post-show">
                <div class="title-text-post-show-content">
                    <h1>{{ $post->title }}</h1>
                    <p>{{ $post->created_at->format('d-m-Y | H:i') }}</p>
                </div>
                <div class="title-icon-post">
                    <a href="/posts/{{ $post->id }}/edit"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                    {!! Form::open([
                        'action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                        'method' => 'DELETE',
                        'class' => 'btn',
                    ]) !!}
                    {{ Form::button('<i class="fa-solid fa-trash fa-xl"></i>', ['type' => 'submit', 'class' => 'note_show_delete']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="body-content-post-show">
            <p>{{ $post->body }}</p>
        </div>
    </div>
@endsection
