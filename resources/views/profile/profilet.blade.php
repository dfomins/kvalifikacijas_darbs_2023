@extends('layouts.app')

@section('content')
    <section class="profile">
        <div class="profile_window panel-standart">
            <div class="sidebar">
                <div class="sidebar_content">
                    <h2>{{ auth()->user()->fname }} {{ auth()->user()->lname }}</h2>
                    @if (Auth::user()->role == 1)
                        <h4 class="work-post">
                            Vadītājs
                        </h4>
                    @elseif (Auth::user()->role == 2)
                        <h4 class="work-post">
                            Darbinieks
                        </h4>
                    @endif
                    <span style="background-image: url({{ auth()->user()->photo }})"></span>
                    <img src="img/profile_bg.jpg" alt="Profila bilde" />
                    <div class="profile_settings">
                        <a href="/profila_iestatijumi">Profila iestatījumi</a>
                        <a href="#">
                            <p></p>
                        </a>
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
            </div>
            <div class="profile_centerbar">
                <div class="profile_centerbar_panel">
                    <div class="profile_centerbar_panel_status">
                        <div class="profile_centerbar_panel_status_header profile_centerbar_panel_header">
                            <p class="day"></p>
                            <p class="date"></p>
                        </div>
                        <div class="profile_centerbar_panel_content">
                            <div class="profile_centerbar_panel_content_text">
                                <p>Statuss: </p>
                                <p>Nostrādātās stundas: </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src={{ url('js/calendar.js') }}></script>
@endsection
