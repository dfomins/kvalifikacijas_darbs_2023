@extends('layouts.app')

@section('title')
    {{ 'Paziņojumi' }}
@endsection

@section('content')
    <section class="section-min-height flex w-full flex-col items-center bg-[#f2f2f2]">
        <div class="mt-[50px] mb-[100px] w-[1200px] max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px] max-sm:w-[90%]">
            <h2 class="mb-[50px] text-center text-[25px] font-semibold tracking-wide">Paziņojumi</h2>
            @livewire('show-notifs')
        </div>
    </section>
@endsection
