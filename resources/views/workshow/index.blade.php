@extends('layouts.app')

@section('title')
    {{ 'Darbs' }}
@endsection

@section('content')
    <section class="section-min-height color-2 flex w-full flex-col items-center">

        @livewire('work-show')

    </section>
@endsection
