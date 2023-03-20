@extends('layouts.app')

@section('content')
    <div class="section-min-height flex w-full flex-col items-center bg-[#f2f2f2] px-[20px] pb-[30px]">
        <h2 class="my-[40px] text-[25px] font-semibold tracking-wide">Paziņojumi</h2>
        @livewire('show-notifs')
        @if (Auth::user()->role_id == 1)
            <a href="{{ route('notifications') }}/jauns"><button
                    class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] text-center text-white duration-300 hover:bg-[#52ab98]">Izveidot
                    jaunu</button>
            </a>
        @endif
    </div>
@endsection
