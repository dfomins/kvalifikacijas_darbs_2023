@extends('layouts.app')

@section('content')
    <div class="profile_edit_page_window panel-standart">
        <div class="profile_edit_panel">
            <div class="profile_edit_panel_title">
                <h2>Profila iestaījumi</h2>
            </div>
            <div class="profile_edit_panel_settings">
                <div class="profile_edit_panel_settings_frow">
                    asd
                </div>
                <div class="profile_edit_panel_settings_srow">
                    <h3>Pamata informācija</h3>
                    <form method="POST" action="{{ route('update_profile') }}" id="update_profile_form">
                        @csrf
                        <label for="fname">Vārds</label>
                        <input type="text" name="fname" value="{{ old('fname') ? old('fname') : $user->fname }}">
                        <span class="error">
                            @error('fname', 'update_profile')
                                {{ $message }}
                            @enderror
                        </span>
                        <label for="lname">Uzvārds</label>
                        <input type="text" name="lname" value="{{ old('lname') ? old('lname') : $user->lname }}">
                        <span class="error">
                            @error('lname', 'update_profile')
                                {{ $message }}
                            @enderror
                        </span>
                        <label for="email">E-pasts</label>
                        <input type="email" name="email" value="{{ old('email') ? old('email') : $user->email }}">
                        <span class="error">
                            @error('email', 'update_profile')
                                {{ $message }}
                            @enderror
                        </span>
                        <button type="submit" name="update_profile" class="setting_srow_button">Saglabāt</button>
                    </form>
                    <form method="POST" action="{{ route('update_profile') }}" id="update_password_form">
                        <h3>Paroles maiņa</h3>
                        @csrf
                        <label for="old_password">Vecā parole</label>
                        <input type="password" name="old_password">
                        <span class="error">
                            @error('old_password', 'update_password')
                                {{ $message }}
                            @enderror
                        </span>
                        @if (session('error'))
                            <span class="error">{{ session('error') }}</span>
                        @endif
                        <label for="new_password">Jauna parole</label>
                        <input type="password" name="new_password">
                        <span class="error">
                            @error('new_password', 'update_password')
                                {{ $message }}
                            @enderror
                        </span>
                        <label for="confirm_password">Apstipriniet paroli</label>
                        <input type="password" name="confirm_password">
                        <span class="error">
                            @error('confirm_password', 'update_password')
                                {{ $message }}
                            @enderror
                        </span>
                        @if (session('success'))
                            <span class="success">{{ session('success') }}</span>
                        @endif
                        <button type="submit" name="update_password" class="setting_srow_button">Saglabāt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
