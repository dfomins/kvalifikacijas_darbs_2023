@extends('auth.layouts.app')

@section('title')
    {{ 'Paroles atkopšana' }}
@endsection

@section('content')
    <div style="background-image: url(/img/backgrounds/login_bg_2.jpg);" class="flex h-[100vh] bg-cover bg-center">
        <div class="m-auto w-[400px] flex-col items-center max-[470px]:w-[90%]">
            <img class="m-auto h-[150px] w-[150px] text-center" src="/img/logo/logo.png" alt="Logo" />
            <h1 class="mb-[10px] text-center text-[30px] font-semibold max-[470px]:text-[6.3vw]">Paroles atkopšana</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="email">{{ __('E-pasts') }}</label>
                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="password">{{ __('Parole') }}</label>

                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password-confirm">{{ __('Atkārtojiet paroli') }}</label>

                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">

                <div class="text-center">
                    <button
                        class="my-[15px] cursor-pointer rounded-[3px] border border-black bg-white py-[10px] px-[50px] text-[18px] duration-300 hover:bg-[#c8d8e4]"
                        type="submit" id="btn">
                        Sūtīt
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
