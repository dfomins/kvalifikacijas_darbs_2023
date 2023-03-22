@extends('layouts.app')

@section('title')
    {{ 'Visi lietotāji' }}
@endsection

@section('content')
    <section class="section-min-height color-2 flex justify-center">
        <div class="mt-[50px] mb-[100px]">
            <h2 class="mb-[50px] text-center text-[25px] font-semibold tracking-wide">Visi lietotāji</h2>
            @livewire('all-users')
        </div>
    </section>
@endsection
