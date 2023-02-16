@extends('auth.layouts.app')

@section('content')
    <div class="login_window">
        <div class="login_panel">
            <div class="">
                <h1>{{ __('Paroles atkopšana') }}</h1>
            </div>

            @if (session('status'))
                <div style="color: green">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email">{{ __('Ievadiet e-pastu') }}</label>

                <input id="email" type="email" class="fail @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" id="btn">
                    {{ __('Sūtīt') }}
                </button>

                <a href="/login">
                    Pieslēgties</a>
            </form>
        </div>
    </div>
@endsection
