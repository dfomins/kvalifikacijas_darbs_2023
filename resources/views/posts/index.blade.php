@extends('layouts.app')

@section('title')
    {{ 'Privātās piezīmes' }}
@endsection

@section('content')
    <section class="section-min-height color-2 flex w-full flex-col items-center">
        <div class="mt-[50px] mb-[100px] w-[1200px] max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px] max-sm:w-[90%]">
            <h2 class="mb-[50px] text-center text-[25px] font-semibold tracking-wide">Privātās piezīmes</h2>
            @livewire('show-posts')
            <div class="flex justify-center">
                <a href="{{ route('posts') }}/jauns"><button
                        class="group flex h-[50px] w-[50px] cursor-pointer items-center justify-center rounded-full bg-[#2b6777] text-white duration-300 hover:bg-[#52ab98]"><i
                            class="fa-solid fa-plus text-[20px] duration-300 group-hover:rotate-90"></i></button>
                </a>
            </div>
        </div>
    </section>
@endsection
