@extends('layouts.app')

@section('content')
    <div class="section-min-height flex w-full flex-col items-center bg-[#f2f2f2] pt-[50px] pb-[100px] max-lg:px-[20px]">
        <h2 class="mb-[40px] text-[25px] font-semibold tracking-wide">Privātās piezīmes</h2>
        @livewire('show-posts')
        <a href="{{ route('posts') }}/jauns"><button
                class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] text-center text-white duration-300 hover:bg-[#52ab98]">Izveidot
                jaunu</button>
        </a>
    </div>
@endsection
