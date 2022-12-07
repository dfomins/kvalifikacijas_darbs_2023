@extends('layouts.app')

@section('content')
    <div class="sidebar">
        <div class="sidebar-content panel-standart">
            <h2 class="name">{{ auth()->user()->fname }} {{ auth()->user()->lname }}</h2>
            @if (Auth::user()->role == 1)
                <h4 class="work-post">
                    Vadītājs
                </h4>
            @elseif (Auth::user()->role == 2)
                <h4 class="work-post">
                    Darbinieks
                </h4>
            @endif
            <img src="img/pfp.jpg" alt="Profila bilde" class="sidebar-pfp" />
            <div class="settings">
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
    <div class="centerbar">
        <div class="centerbar-panel">
            <div class="upper upper-day" id="upperDay">
                <ul>
                    <li class="day"></li>
                    <li class="date"></li>
                </ul>
            </div>
            <div class="centerbar-content panel-standart">
                <p>Statuss:</p>
                <p>Nostrādātas stundas:</p>
            </div>
        </div>
        <div class="centerbar-panel">
            <div class="upper upper-month" id="upperMonth">
                <ul>
                    <li class="previous">&#10094;</li>
                    <li class="next">&#10095;</li>
                    <li class="month"></li>
                    <li class="year"></li>
                </ul>
            </div>
            <div class="centerbar-content panel-standart calendar">
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
@endsection
