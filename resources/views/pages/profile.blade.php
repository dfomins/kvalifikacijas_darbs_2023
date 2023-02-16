@extends('layouts.app')

@section('content')
    <div class="profile_window">
        <div class="sidebar">
            <div class="sidebar_content panel-standart">
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
                <img src="img/pfp.jpg" alt="Profila bilde" />
                <div class="profile_settings">
                    <p>Mainīt profila bildi(-)</p>
                    <div class="pfp">
                        <p>{{ Form::file('cover_image') }}</p>
                    </div>
                    <a href="#">
                        <p></p>
                    </a>
                    @if (Auth::user()->role == 1)
                        <a href="/register">
                            <p>Izveidot jaunu lietotāju</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="profile_centerbar">
            <div class="profile_centerbar_panel panel-standart">
                <div class="profile_centerbar_panel_status panel-standart">
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


            <div class="profile_centerbar_panel panel-standart">
                <div class="profile_centerbar_panel_calendar">
                    <div class="profile_centerbar_panel_calendar_header profile_centerbar_panel_header">
                        <div class="header_prev">
                            <p class="previous">&#10094;</p>
                        </div>
                        <div class="header_date">

                            <p class="month"></p>
                            <p class="year"></p>

                        </div>
                        <div class="header_next">

                            <p class="next">&#10095;</p>

                        </div>
                    </div>
                    <div class="profile_centerbar_panel_content">
                        <div class="weekdays">
                            <div>P</div>
                            <div>O</div>
                            <div>T</div>
                            <div>C</div>
                            <div>P</div>
                            <div><strong>S</strong></div>
                            <div><strong>Sv</strong></div>
                        </div>
                        <div class="grid-calendar days"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
