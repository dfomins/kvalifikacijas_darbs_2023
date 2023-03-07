@extends('auth.layouts.app')

@section('content')
    <div class="login_window">
        <div class="login_panel">
            <img src="../images/logo.png" alt="" />
            <h1>Reģistrācija</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="login_form_label">
                    <input type="text" name="fname" placeholder="Vārds" value="{{ old('fname') }}" />
                    <span class="error">
                        @error('fname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="login_form_label">
                    <input type="text" name="lname" placeholder="Uzvārds" value="{{ old('lname') }}" />
                    <span class="error">
                        @error('lname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="login_form_label">
                    <input type="text" name="email" placeholder="E-pasts" value="{{ old('email') }}" />
                    <span class="error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="login_form_label">
                    <select name="role_id">
                        <option value="none" selected disabled hidden>Izvēlieties lomu</option>
                        <option value="1">Vadītājs</option>
                        <option value="2">Brigadieris</option>
                        <option value="3">Darbinieks</option>
                    </select>
                    <span class="error">
                        @error('role_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="login_form_label">
                    <input id="password" type="password" name="password" placeholder="Parole"
                        autocomplete="new-password" />
                    <span class="error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="login_form_label">
                    <input id="password" type="password" name="password_confirmation" placeholder="Apstipriniet paroli"
                        autocomplete="new-password" />
                    <span class="error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" name="button" id="btn">Reģistrēt</button>
            </form>
            <a href="{{ route('profile') }}">Uz profilu</a>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
