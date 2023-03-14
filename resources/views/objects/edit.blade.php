@extends('layouts.app')

@section('content')
    <div class="section-min-height flex w-full justify-center bg-[#f2f2f2]">
        <div class="w-[100%] rounded-[3px] py-[70px] px-[20px] sm:px-[40px] md:w-[80%] lg:w-[60%]">
            <div class="pb-[20px]">
                <a href="{{ route('objects') }}/{{ $object->id }}">
                    <button
                        class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[20px] text-white duration-300 hover:bg-[#52ab98]">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
            </div>
            <div class="mb-[10px] flex justify-center text-white">
                <h3 class="text-xl font-semibold text-black">Rediģēt objektu #{{ $object->id }}</h3>
            </div>
            {!! Form::open([
                'action' => ['App\Http\Controllers\ObjectsController@update', $object->id],
                'method' => 'PUT',
                'class' => 'flex flex-col text-white',
                'enctype' => 'multipart/form-data',
            ]) !!}
            {{ Form::label('title', 'Nosaukums', ['class' => 'pt-[15px] text-black']) }}
            {{ Form::text('title', $object->title, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
            {{ Form::label('city', 'Pilsēta', ['class' => 'pt-[15px] text-black']) }}
            {{ Form::text('city', $object->city, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
            {{ Form::label('street', 'Iela', ['class' => 'pt-[15px] text-black']) }}
            {{ Form::text('street', $object->street, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
            {{ Form::label('body', 'Informācija', ['class' => 'pt-[15px] text-black']) }}
            {{ Form::textarea('body', $object->body, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
            {{ Form::file('object_img', ['class' => 'bg-white mx-auto my-[10px] text-black w-full cursor-pointer rounded-[3px] border-2 border-dashed p-[10px] border-black file:cursor-pointer file:outline-0']) }}
            {{ Form::submit('Apstiprināt', ['class' => 'cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] mt-[20px] duration-300 hover:bg-[#52ab98]']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
