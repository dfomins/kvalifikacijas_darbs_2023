@extends('layouts.app')

@section('title')
    {{ 'Privātās piezīmes' }}
@endsection

@section('content')
    <section class="section-min-height flex w-full flex-col items-center bg-[#f2f2f2]">
        <div class="mt-[50px] mb-[100px] w-[1200px] max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px] max-sm:w-[90%]">
            <h2 class="mb-[50px] text-center text-[25px] font-semibold tracking-wide">Privātās piezīmes</h2>
            @livewire('show-posts')
            <div class="text-center">
                <a href="{{ route('posts') }}/jauns"><button
                        class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] text-white duration-300 hover:bg-[#52ab98]">Izveidot
                        jaunu</button>
                </a>
            </div>
        </div>
    </section>
@endsection
