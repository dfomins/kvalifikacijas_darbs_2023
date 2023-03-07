@extends('layouts.app')
@section('content')
    <div class="section-min-height w-full overflow-y-auto bg-[#52ab98]">
        <div class="flex w-full items-center bg-[#2b6777] px-[20px] py-[20px] text-white sm:px-[20%]">
            <a href="{{ route('posts') }}">
                <div
                    class="mr-[3vw] flex h-[30px] w-[30px] cursor-pointer items-center justify-center rounded-full bg-[#1B9AAA] text-center md:mr-[30px]">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </div>
            </a>
            <div class="title-text-post-show inline-flex w-[calc(100%-(3vw+30px))] sm:w-full">
                <div
                    class="title-text-post-show-content inline-block w-full overflow-hidden text-ellipsis whitespace-nowrap">
                    <h1 class="text-[20px]">{{ $post->title }}</h1>
                    <div class="text-[15px]">{{ $post->created_at->format('d-m-Y | H:i') }}</div>
                </div>
                <div class="title-icon-post flex cursor-pointer items-center justify-center">
                    <a href="{{ route('posts') }}/{{ $post->id }}/rediget"><i
                            class="fa-solid fa-pen-to-square fa-lg ml-[15px]"></i></a>
                    {!! Form::open([
                        'action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                        'method' => 'DELETE',
                        'class' => 'btn',
                    ]) !!}
                    {{ Form::button('<i class="fa-solid fa-trash fa-xl ml-[15px]"></i>', ['type' => 'submit', 'class' => 'note_show_delete']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="body-content-post-show my-[20px] px-[20px] text-white sm:px-[20%]">
            <p>{{ $post->body }}</p>
        </div>
    </div>
@endsection
