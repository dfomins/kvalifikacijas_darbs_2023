@extends('layouts.app')

@section('content')
    <div class="section-min-height flex w-full flex-col items-center bg-[#52ab98] px-[20px] pb-[30px]">
        <h2 class="my-[40px] text-[25px] font-semibold tracking-wide text-white">Privātās piezīmes</h2>
        <div class="mb-[20px] h-[65vh] w-full justify-center overflow-y-auto text-white lg:w-[80%] xl:w-[70%]">
            <ol>
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <a class="text-black" href="{{ route('posts') }}/{{ $post->id }}">
                            <li class="mb-[10px] flex w-full bg-[#FCFCFC] p-[10px]">
                                <div class="note_post">
                                    <h3>{{ $post->title }}</h3>
                                    <p>Izveidota: {{ $post->created_at->format('d-m-Y') }}</p>
                                </div>
                            </li>
                        </a>
                    @endforeach
                @else
                    <p class="text-center">Piezīmju nav</p>
                @endif
            </ol>
        </div>
        <a href="{{ route('posts') }}/jauns"><button
                class="cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-center duration-300 hover:bg-[#c8d8e4]">Izveidot
                jaunu</button>
        </a>
    </div>
@endsection
