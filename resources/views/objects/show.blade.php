@extends('layouts.app')

@section('title')
    {{ 'Apskatīt objektu' }}
@endsection

@section('content')
    <div class="section-min-height color-2 w-full overflow-y-auto">
        <div class="flex min-h-[100px] items-center justify-center bg-[#2b6777] py-[20px] text-white">
            <div class="flex w-[1200px] max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px] max-sm:w-[90%]">
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
        </div>
        @if ($object->object_img != null)
            <div class="flex w-full justify-center">
                <div class="w-[1200px] max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px] max-sm:w-[90%]">
                    <div class="flex flex-col md:flex-row">
                        <img class="float-left my-[20px] h-[vw] w-[vw] rounded-[3px] border border-black object-cover sm:h-[300px] sm:w-[300px] md:mr-[20px]"
                            src="{{ asset('storage/images/objects/' . $object->object_img) }}" alt="Objekta bilde">
                        <div class="break-all md:m-[20px]">
                            <h4 class="mb-[5px] text-[20px]">
                                <strong>Pilsēta:</strong>
                                {{ $object->city }}
                            </h4>
                            <h4 class="mb-[5px] text-[20px]"><strong>Iela:</strong> {{ $object->street }}</h4>
                            <h4 class="mb-[5px] text-[20px]">
                                {{-- <strong>Brigadieris:</strong>{{ dd($object->objecttouser) }} --}}
                            </h4>
                        </div>
                    </div>
                    <div class="my-[20px] mr-[20px] md:mt-0">
                        <h4 class="mb-[10px] text-[20px] font-bold">Informācija:</h4>
                        <p class="break-words text-justify">
                            @if (!is_null($object->body))
                                {{ $object->body }}
                            @else
                                Nav
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
