@extends('layouts.app')

@section('title')
    {{ 'Visi lietotāji' }}
@endsection

@section('content')
    @livewire('all-users')
@endsection
