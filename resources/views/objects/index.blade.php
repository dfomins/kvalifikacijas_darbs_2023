@extends('layouts.app')

@section('content')
    <div class="section-min-height color-2 flex w-full flex-col items-center px-[20px] pb-[30px]">
        <h2 class="my-[40px] text-[25px] font-semibold tracking-wide">Informācija par objektiem</h2>
        @if (count($objects) > 0)
            <ol
                class="mb-[20px] grid h-[65vh] w-full grid-cols-1 justify-items-center gap-y-8 md:w-[768px] md:grid-cols-2 xl:w-[1280px] xl:grid-cols-3">
                @foreach ($objects as $object)
                    <li>
                        <div class="border border-black">
                            <a href="{{ route('objects') }}/{{ $object->id }}">
                                <img class="hover: h-[300px] w-[300px] object-cover"
                                    src="{{ asset('img/objects/' . $object->object_img) }}" alt="Objekta bilde">
                            </a>
                            <div
                                class="color-1 hover:color-4 flex w-[300px] flex-col justify-center py-[7px] px-[10px] duration-300">
                                <a href="{{ route('objects') }}/{{ $object->id }}">
                                    <h3 class="truncate text-white">{{ $object->title }}</h3>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>
        @else
            <div class="h-[65vh]">
                <p class="col-start-2 text-center text-black">Informācijas par objektiem nav</p>
            </div>
        @endif
        @if (Auth::user()->role_id == 1)
            <a href="{{ route('objects') }}/jauns">
                <button
                    class="color-1 hover:color-3 cursor-pointer rounded-[3px] py-[10px] px-[15px] text-center text-white duration-300">Izveidot
                    jaunu
                </button>
            </a>
        @endif
    </div>
@endsection
