@extends('layouts.app')

@section('content')
    <div class="users_page_window panel-standart">
        <div class="users_panel">
            <h2>Informācija par objektiem</h2>
            <table>
                <div class="users_row">
                    @foreach ($users as $user)
                        <div>{{ $user->id }}</div>
                        <div></div>
                        <div>{{ $user->fname }}{{ $user->lname }}</div>
                        <div>{{ $user->roles->name }}</div>
                    @endforeach
                </div>
            </table>
        </div>
    </div>
@endsection
