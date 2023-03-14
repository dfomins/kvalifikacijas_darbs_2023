@extends('layouts.app')
@section('content')
    <div class="section-min-height color-2 w-full overflow-y-auto">
        <div class="flex min-h-[100px] w-full items-center bg-[#2b6777] px-[20px] py-[20px] text-white sm:px-[20%]">
            <a href="{{ route('objects') }}">
                <div
                    class="mr-[3vw] flex h-[30px] w-[30px] cursor-pointer items-center justify-center rounded-full bg-[#1B9AAA] text-center md:mr-[15px]">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </div>
            </a>
            <div class="inline-flex w-[calc(100%-(3vw+35px))] sm:w-full">
                <div class="inline-block w-full">
                    <h1 class="break-all text-[25px]">{{ $object->title }}</h1>
                </div>
                <div class="flex cursor-pointer items-center justify-center">
                    <a href="{{ route('objects') }}/{{ $object->id }}/rediget"><i
                            class="fa-solid fa-pen-to-square fa-lg ml-[15px]"></i></a>
                    {!! Form::open([
                        'action' => ['App\Http\Controllers\ObjectsController@destroy', $object->id],
                        'method' => 'DELETE',
                        'class' => 'btn',
                    ]) !!}
                    {{ Form::button('<i class="fa-solid fa-trash fa-xl ml-[15px]"></i>', ['type' => 'submit']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @if ($object->object_img != null)
            <div>
                <div class="flex w-full flex-col lg:flex-row">
                    <img class="float-left m-[20px] h-[vw] w-[vw] object-cover sm:ml-[20%] sm:h-[300px] sm:w-[300px]"
                        src="{{ asset('img/objects/' . $object->object_img) }}" alt="Objekta bilde">
                    <div class="mx-[20px] break-all sm:mx-[20%] lg:m-[20px] lg:mr-[20%]">
                        <h4 class="mb-[5px] text-[20px]"><strong>ID:</strong>
                            {{ $object->id }}</h4>
                        <h4 class="mb-[5px] text-[20px]">
                            <strong>Pilsēta:</strong>
                            {{ $object->city }}
                        </h4>
                        <h4 class="mb-[5px] text-[20px]"><strong>Iela:</strong> {{ $object->street }}</h4>
                    </div>
                </div>
                <div class="m-[20px] sm:mx-[20%] sm:mt-0">
                    <h4 class="mb-[10px] text-[20px] font-bold">Informācija:</h4>
                    <p class="break-words text-justify">{{ $object->body }}
                </div>
                </p>
            </div>
        @endif
    </div>
@endsection
