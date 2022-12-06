@extends('auth.layouts.app')

@section('content')
    {{-- <div class="card-header">{{ __('Login') }}</div> --}}

    <div class="login-panel">
        <div class="login-panel">
            <img src="../images/logo.png" alt="" />
            <h1>Pieslēgšanās lapa</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="text" name="email" placeholder="E-pasts" value="{{ old('email') }}" />
                <span style="color: red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>

                <input type="password" name="password" placeholder="Parole" />
                <span style="color: red">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>

                <button type="submit" name="button" id="btn">Pieslēgties</button>

                @if (Route::has('password.request'))
                    <p><a href="{{ route('password.request') }}">Aizmirsāt paroli?</a></p>
                @endif
            </form>
        </div>
    @endsection
