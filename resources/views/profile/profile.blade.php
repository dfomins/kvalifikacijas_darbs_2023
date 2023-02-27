@extends('layouts.app')

@section('content')
    <section class="profile">
        <div class="profile_page_window">
            <div class="profile_sidebar">
                <div class="profile_sidebar_content">
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
            </div>
            <div class="profile_center">
                <div class="profile_work_status">
                    <div class="profile_date_title">
                        <p class="day"></p>
                        <p class="date"></p>
                    </div>
                    <div class="work_status_panel">
                        Statuss:
                        Nostrādātās stundas:
                    </div>
                </div>
                <div class="latest_notifs">
                    <div class="latest_notifs_title">
                        Pēdējie paziņojumi
                    </div>
                    <div class="latest_notifs_panel">
                        @if (count($recentNotifs) > 0)
                            @foreach ($recentNotifs as $notif)
                                <li class="profile_note_row">
                                    <div class="profile_note_post"><a href="/notifications/{{ $notif->id }}">
                                            <h3>{{ $notif->title }}</h3>
                                            <p class="timestamp">Izveidots: {{ $notif->created_at->format('d-m-Y') }}
                                            </p>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p style="text-align: center">Paziņojumu nav</p>
                        @endif
                    </div>
                    <div class="latest_notifs_button">
                        <button type="button">
                            <a href="/notifications">Visi paziņojumi</a></button>
                    </div>
                </div>
                <div class="latest_posts">
                    <div class="latest_posts_title">
                        Pēdējās piezīmes
                    </div>
                    <div class="latest_posts_panel">
                        @if (count($recentPosts) > 0)
                            @foreach ($recentPosts as $post)
                                <li class="profile_note_row">
                                    <div class="profile_note_post"><a href="/posts/{{ $post->id }}">
                                            <h3>{{ $post->title }}</h3>
                                            <p class="timestamp">Izveidots: {{ $post->created_at->format('d-m-Y') }}
                                            </p>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p style="text-align: center">Piezīmju nav</p>
                        @endif
                    </div>
                    <div class="latest_notifs_button">
                        <button type="button">
                            <a href="/posts">Visas piezīmes</a>
                        </button>
                    </div>
                </div>
            </div>
    </section>
    <script src={{ url('js/calendar.js') }}></script>
@endsection
