@extends('layouts.app')

@section('content')
    <div class="users_page_window panel-standart">
        <div class="users_panel">
            <h2>Informācija par objektiem</h2>
            <table>
                <div class="users_row">
                    @foreach ($users as $user)
                        <div class="user_info">
                            <div class="user_info_id">{{ $user->id }}</div>
                            <div class="user_info_photo"><img src="{{ asset('img/users/' . $user->profila_bilde) }}"
                                    alt=""></div>
                            <div class="user_info_name">{{ $user->fname }} {{ $user->lname }}</div>
                            <div class="user_info_role">{{ $user->roles->name }}</div>
                        </div>
                    @endforeach
                </div>
            </table>
        </div>
    </div>
@endsection
