@extends('auth.layouts.app')

@section('content')
    <div class="login_window">
        <div class="login_panel">
            <img src="../images/logo.png" alt="" />
            <h1>Reģistrēšanas lapa</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input type="text" name="fname" placeholder="Vārds" value="{{ old('fname') }}" />
                <span style="color: red">
                    @error('fname')
                        {{ $message }}
                    @enderror
                </span>

                <input type="text" name="lname" placeholder="Uzvārds" value="{{ old('lname') }}" />
                <span style="color: red">
                    @error('lname')
                        {{ $message }}
                    @enderror
                </span>

                <input type="text" name="email" placeholder="E-pasts" value="{{ old('email') }}" />
                <span style="color: red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>

                <input id="password" type="password" name="password" placeholder="Parole" required
                    autocomplete="new-password" />
                <span style="color: red">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>

                <input id="password" type="password" name="password_confirmation" placeholder="Apstipriniet paroli"
                    required autocomplete="new-password" />
                <span style="color: red">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>

                <button type="submit" name="button" id="btn">Reģistrēt</button>
            </form>
            <a style="cursor: pointer;" onclick="history.back()">Atgriezties</a>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
