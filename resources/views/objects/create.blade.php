@extends('layouts.app')

@section('title')
    {{ 'Izveidot objektu' }}
@endsection

@section('content')
    <section class="section-min-height color-2">
        <div class="my-[100px] mx-auto w-[100%] rounded-[3px] sm:px-[40px] md:w-[80%] lg:w-[60%]">
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
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @endforeach
                @endif
                {{ Form::label('title', 'Nosaukums', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::text('title', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                {{ Form::label('city', 'Pilsēta', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::text('city', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                {{ Form::label('street', 'Iela', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::text('street', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
                {{ Form::label('body', 'Informācija', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::textarea('body', '', ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px resize-none']) }}
                {{ Form::label('object_image', 'Objekta bilde', ['class' => 'pt-[15px] text-black']) }}
                {{ Form::file('object_img', ['class' => 'bg-white mx-auto my-[5px] text-black w-full cursor-pointer rounded-[3px] border-2 border-dashed p-[10px] border-black file:cursor-pointer file:outline-0']) }}
                <div>
                    {{ Form::submit('Izveidot', ['class' => 'cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] mt-[20px] duration-300 hover:bg-[#52ab98]']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
