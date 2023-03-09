@extends('layouts.app')

@section('content')
    <div class="section-min-height">
        <div
            class="mx-auto my-[50px] w-[100%] rounded-[3px] border border-[.color-1] px-[20px] py-[50px] shadow-md sm:px-[40px] md:w-[80%] lg:w-[60%]">
            <div class="pb-[20px]">
                <a href="{{ route('posts') }}">
                    <button
                        class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[20px] text-white duration-300 hover:bg-[#52ab98]">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
            </div>
            <h3 class="text-center text-xl font-semibold">Izveidot jaunu piezīmi</h3>
            <div>
                {!! Form::open([
                    'action' => 'App\Http\Controllers\PostsController@store',
                    'method' => 'POST',
                    'class' => 'flex flex-col text-white',
                ]) !!}
                {{ Form::label('title', 'Nosaukums', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::text('title', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                <span class="error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('body', 'Saturs', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::textarea('body', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px resize-none']) }}
                <span class="error">
                    @error('body')
                        {{ $message }}
                    @enderror
                </span>
                <div>
                    {{ Form::submit('Izveidot', ['class' => 'cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] mt-[20px] duration-300 hover:bg-[#52ab98]']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
