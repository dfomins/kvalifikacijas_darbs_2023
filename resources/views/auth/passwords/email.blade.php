@extends('auth.layouts.app')

@section('title')
    {{ 'Paroles atkopšana' }}
@endsection

@section('content')
    <div style="background-image: url(/img/backgrounds/login_bg_2.jpg);" class="flex h-[100vh] bg-cover bg-center">
        <div class="m-auto w-[400px] flex-col items-center max-[470px]:w-[90%]">
            <img class="m-auto h-[150px] w-[150px] text-center" src="/img/logo/logo.png" alt="Logo" />
            <h1 class="mb-[10px] text-center text-[30px] font-semibold max-[470px]:text-[6.3vw]">Paroles atkopšana</h1>
            @if (session('status'))
                <div class="mt-[15px] flex rounded-[3px] bg-green-600 p-[10px] text-white" data-closable>
                    <div class="w-[calc(100%)-11px]">
                        <i class="fa-solid fa-check"></i> {{ session('status') }}
                    </div>
                    <button onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                </div>
            @endif
            @error('email')
                <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }} <button
                        onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                </div>
            @enderror
            <form class="flex flex-col" method="POST" action="{{ route('password.email') }}">
                @csrf

                <input
                    class="mt-[20px] mb-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    id="email" type="email" placeholder="Ievadiet e-pastu"
                    class="fail @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    autocomplete="email" autofocus>

                <div class="text-center">
                    <button
                        class="my-[15px] cursor-pointer rounded-[3px] border border-black bg-white py-[10px] px-[50px] text-[18px] duration-300 hover:bg-[#c8d8e4]"
                        type="submit" id="btn">Sūtīt
                    </button>
                </div>

                <a class="text-center" href="{{ route('login') }}">
                    Pieslēgties</a>
            </form>
        </div>
    </div>
@endsection
