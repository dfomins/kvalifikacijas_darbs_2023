@extends('layouts.app')

@section('content')
    <div class="section-min-height">
        <div
            class="section-min-height mx-auto my-[50px] w-[100%] rounded-[3px] border border-[.color-1] px-[20px] py-[50px] shadow-md sm:px-[40px] md:w-[80%] lg:w-[60%]">
            <div class="pb-[20px]">
                <a href="{{ route('objects') }}">
                    <button
                        class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[20px] text-white duration-300 hover:bg-[#52ab98]">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
            </div>
            <div>
                {!! Form::open([
                    'action' => 'App\Http\Controllers\ObjectsController@store',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                    'class' => 'flex flex-col text-white',
                ]) !!}
                {{ Form::label('title', 'Nosaukums', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::text('title', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                <span class="error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('city', 'Pilsēta', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::text('city', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                <span class="error">
                    @error('city')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('street', 'Iela', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::text('street', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                <span class="error">
                    @error('street')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('body', 'Informācija', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::textarea('body', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px resize-none']) }}
                <span class="error">
                    @error('body')
                        {{ $message }}
                    @enderror
                </span>
                {{ Form::label('object_img', 'Objekta bilde', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::file('object_img', ['class' => 'file:cursor-pointer text-black my-[5px]']) }}
                <span class="error">
                    @error('object_img')
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
