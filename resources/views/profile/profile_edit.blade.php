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
                    <form method="POST" action="{{ route('update_profile') }}" id="update_profile_form">
                        @csrf
                        <label for="fname">Vārds</label>
                        <input type="text" name="fname" value="{{ old('fname') ? old('fname') : $user->fname }}">
                        <span class="error">
                            @error('fname')
                                {{ $message }}
                            @enderror
                        </span>
                        <label for="lname">Uzvārds</label>
                        <input type="text" name="lname" value="{{ old('lname') ? old('lname') : $user->lname }}">
                        <span class="error">
                            @error('lname')
                                {{ $message }}
                            @enderror
                        </span>
                        <label for="email">E-pasts</label>
                        <input type="email" name="email" value="{{ old('email') ? old('email') : $user->email }}">
                        <span class="error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <button type="submit" class="setting_srow_button">Saglabāt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
