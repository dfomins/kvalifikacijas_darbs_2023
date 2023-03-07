@extends('layouts.app')

@section('content')
    <div class="note_edit_page_window section-min-height flex w-full items-center justify-center bg-[#52ab98]">
        <div class="note_create_panel max-h-[70%] w-[100%] rounded-[3px] py-[20px] px-[40px] md:w-[80%] lg:w-[60%]">
            <div class="note_edit_button_back pb-[20px]">
                <a href="{{ route('posts') }}">
                    <button
                        class="cursor-pointer bg-[#165861] py-[10px] px-[20px] text-white duration-300 hover:bg-[#c8d8e4] hover:text-black">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
            </div>
            <div class="note_edit_title mb-[10px] flex justify-center text-white">
                <h3 class="text-xl font-semibold">Rediģēt piezīmi #{{ $post->id }}</h3>
            </div>
            <div class="note_edit_form">
                {!! Form::open([
                    'action' => ['App\Http\Controllers\PostsController@update', $post->id],
                    'method' => 'PUT',
                    'class' => 'flex flex-col text-white',
                ]) !!}
                {{ Form::label('title', 'Nosaukums', ['class' => 'pt-[15px]']) }}
                {{ Form::text('title', $post->title, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                <span class="error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('body', 'Saturs', ['class' => 'pt-[15px]']) }}
                {{ Form::textarea('body', $post->body, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px resize-none']) }}
                <span class="error">
                    @error('body')
                        {{ $message }}
                    @enderror
                </span>
                <div>
                    {{ Form::submit('Apstiprināt', ['class' => 'cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] duration-300 hover:bg-[#c8d8e4] text-black mt-[20px]']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
