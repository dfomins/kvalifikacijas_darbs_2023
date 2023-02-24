@extends('layouts.app')

@section('content')
    <section class="profile">
        <div class="profile_page_window">
            <div class="profile_sidebar">
                <h2>{{ auth()->user()->fname }} {{ auth()->user()->lname }}</h2>
                @if (Auth::user()->role == 1)
                    <h4>
                        Vadītājs
                    </h4>
                @elseif (Auth::user()->role == 2)
                    <h4>
                        Darbinieks
                    </h4>
                @endif
                <img src="img/profile_bg.jpg" alt="Profila bilde" />
                <div class="profile_sidebar_settings">
                    <a href="/profila_iestatijumi">Profila iestatījumi</a>
                    @if (Auth::user()->role == 1)
                        <a href="/register">
                            <p>Izveidot jaunu lietotāju</p>
                        </a>
                        <a href="/users">
                            <p>Visi lietotāji</p>
                        </a>
                    @endif
                </div>
            </div>
            <div class="profile_center">
                <div class="profile_work_status">
                    <div class="profile_date">date</div>
                </div>
            </div>
    </section>
@endsection
