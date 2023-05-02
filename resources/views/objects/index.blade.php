@extends('layouts.app')

@section('title')
    {{ 'Objekti' }}
@endsection

@section('content')
    <section class="section-min-height color-2 flex w-full flex-col items-center px-[20px]">
        <div class="mt-[50px] mb-[100px]">
            <h2 class="mb-[50px] text-center text-[25px] font-semibold tracking-wide">Informācija par objektiem</h2>
            @if (count($objects) > 0)
                <ol
                    class="mx-auto mb-[20px] grid min-h-[65vh] w-[1200px] grid-cols-1 justify-items-center gap-x-10 gap-y-8 max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90%] md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($objects as $object)
                        <li>
                            <div class="border border-black">
                                <a class="group" href="{{ route('objects') }}/{{ $object->id }}">
                                    <img class="h-[300px] w-[400px] object-cover"
                                        src="{{ asset('storage/images/objects/' . $object->object_img) }}"
                                        alt="Objekta bilde">
                                    <div class="color-1 group-hover:color-4 flex h-[38px] items-center duration-300">
                                        <div class="flex h-full w-[38px] items-center justify-center border-r">
                                            <h3 class="truncate text-center text-white">{{ $object->id }}</h3>
                                        </div>
                                        <div class="px-[10px]">
                                            <h3 class="truncate text-white">{{ $object->title }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @else
                <div class="mb-[20px] h-[65vh]">
                    <p class="col-start-2 text-center text-black">Informācijas par objektiem nav</p>
                </div>
            @endif
            @if (auth()->user()->role_id === 1)
                <div class="flex justify-center">
                    <a href="{{ route('objects') }}/jauns">
                        <button
                            class="group flex h-[50px] w-[50px] cursor-pointer items-center justify-center rounded-full bg-[#2b6777] text-white duration-300 hover:bg-[#52ab98]"><i
                                class="fa-solid fa-plus text-[20px] duration-300 group-hover:rotate-90"></i></button>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
