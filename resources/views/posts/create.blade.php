@extends('layouts.app')

@section('content')
    <div class="section-min-height flex w-full items-center justify-center bg-[#52ab98]">
        <div class="max-h-[70%] w-[100%] rounded-[3px] py-[20px] px-[40px] md:w-[80%] lg:w-[60%]">
            <div class="pb-[20px]">
                <a href="{{ route('posts') }}">
                    <button
                        class="cursor-pointer bg-[#165861] py-[10px] px-[20px] text-white duration-300 hover:bg-[#c8d8e4] hover:text-black">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
            </div>
            <div class="mb-[10px] flex justify-center text-white">
                <h3 class="text-xl font-semibold">Izveidot jaunu piezīmi</h3>
            </div>
            <div class="note_create_form">
                {!! Form::open([
                    'action' => 'App\Http\Controllers\PostsController@store',
                    'method' => 'POST',
                    'class' => 'flex flex-col text-white',
                ]) !!}
                {{ Form::label('title', 'Nosaukums', ['class' => 'pt-[15px]']) }}
                {{ Form::text('title', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                <span class="error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('body', 'Saturs', ['class' => 'pt-[15px]']) }}
                {{ Form::textarea('body', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px resize-none']) }}
                <span class="error">
                    @error('body')
                        {{ $message }}
                    @enderror
                </span>
                <div>
                    {{ Form::submit('Izveidot', ['class' => 'cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] duration-300 hover:bg-[#c8d8e4] mt-[20px] text-black']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
