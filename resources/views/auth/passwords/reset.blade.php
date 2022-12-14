@extends('auth.layouts.app')

@section('content')
    <div class="login-window">{{ __('Reset Password') }}
        <div class="login-panel">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <h1>Paroles atkopšana</h1>
                <input type="hidden" name="token" value="{{ $token }}">
                <label for="email">{{ __('E-pasts') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="password">{{ __('Parole') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="password-confirm">{{ __('Paroles atkārtošana') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">

                <button type="submit" id="btn">
                    {{ __('Sūtīt') }}
                </button>

            </form>
        </div>
    </div>
@endsection
