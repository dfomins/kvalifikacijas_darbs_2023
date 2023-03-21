@extends('layouts.app')
@section('content')
    <div class="section-min-height w-full overflow-y-auto bg-[#f2f2f2]">
        <div class="flex min-h-[100px] items-center justify-center bg-[#2b6777] px-[20px] py-[20px] text-white">
            <div class="flex w-[1200px] max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px] max-sm:w-[90%]">
                <a class="my-auto" href="{{ route('posts') }}">
                    <div
                        class="mr-[3vw] flex h-[30px] w-[30px] cursor-pointer items-center justify-center rounded-full bg-[#1B9AAA] text-center md:mr-[15px]">
                        <i class="fa-solid fa-arrow-left-long"></i>
                    </div>
                </a>
                <div class="inline-flex w-[calc(100%-(3vw+35px))] sm:w-full">
                    <div class="inline-block w-full overflow-hidden">
                        <h1 class="break-all text-[20px]">{{ $post->title }}</h1>
                        <p class="truncate text-[15px]">{{ $post->created_at->format('d-m-Y | H:i') }}</p>
                    </div>
                    <div class="flex cursor-pointer items-center justify-center">
                        <a href="{{ route('posts') }}/{{ $post->id }}/rediget"><i
                                class="fa-solid fa-pen-to-square fa-lg ml-[15px]"></i></a>
                        {!! Form::open([
                            'action' => ['App\Http\Controllers\PostsController@destroy', $post->id],
                            'method' => 'DELETE',
                        ]) !!}
                        {{ Form::button('<i class="fa-solid fa-trash fa-xl ml-[15px]"></i>', ['type' => 'submit']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="my-[20px] flex justify-center break-all px-[20px]">
            <div class="w-[1200px] max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px] max-sm:w-[90%]">
                <p>{{ $post->body }}</p>
            </div>
        </div>
    </div>
@endsection
