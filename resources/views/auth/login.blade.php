@extends('auth.layouts.app')

@section('content')
    <div style="background-image: url(/img/backgrounds/login_bg_2.jpg);" class="flex h-[100vh] bg-cover bg-center">
        <div class="m-auto w-[400px] flex-col items-center max-[470px]:w-[90%]">
            <img class="m-auto h-[150px] w-[150px] text-center" src="/img/logo/logo.png" alt="Logo" />
            <h1 class="mb-[10px] text-center text-[30px] font-semibold max-[470px]:text-[6.3vw]">Pieslēgšanās lapa</h1>
            <form class="flex flex-col" method="POST" action="{{ route('login') }}">
                @csrf
                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    type="text" name="email" placeholder="E-pasts" value="{{ old('email') }}" />
                <span style="color: red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>

                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    type="password" name="password" placeholder="Parole" />
                <span style="color: red">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>

                <div class="text-center">
                    <button
                        class="my-[15px] cursor-pointer rounded-[3px] border border-black bg-white py-[10px] px-[30px] text-[18px] duration-300 hover:bg-[#c8d8e4]"
                        type="submit" name="button" id="btn">Pieslēgties
                    </button>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-center" href="{{ route('password.request') }}">Aizmirsāt paroli?</a>
                @endif
            </form>
        </div>
    </div>
@endsection
