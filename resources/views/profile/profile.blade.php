@extends('layouts.app')

@section('content')
    <section class="profile">
        <div class="profile_page_window">
            <div class="profile_sidebar">
                <div class="profile_sidebar_content">
                    <h2>{{ auth()->user()->fname }} {{ auth()->user()->lname }}</h2>
                    <h3 class="profile_role_title">{{ $user->roles->name }}</h3>
                    <img src="{{ asset('img/users/' . auth()->user()->profila_bilde) }}" alt="Profila bilde" />
                    <div class="profile_sidebar_settings">
                        <a href="{{ route('edit_profile') }}">Profila iestatījumi</a>
                        @if (Auth::user()->role_id == 1)
                            <a href="registracija">
                                <p>Izveidot jaunu lietotāju</p>
                            </a>
                            <a href="{{ route('allusers') }}">
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
                        <p>Statuss:</p>
                        </p>Nostrādātās stundas:</p>
                    </div>
                </div>
                <div class="latest_notifs">
                    <div class="latest_notifs_title">
                        Pēdējie paziņojumi
                    </div>
                    <div class="latest_notifs_panel">
                        @if (count($recent_notifs) > 0)
                            @foreach ($recent_notifs as $notif)
                                <li class="profile_note_row">
                                    <div class="profile_note_post"><a
                                            href="{{ route('notifications') }}/{{ $notif->id }}">
                                            <h3>{{ $notif->title }}</h3>
                                            <p class="timestamp">Izveidots: {{ $notif->created_at->format('d-m-Y') }}</p>
                                        </a>
                                    </div>
                            @endforeach
                        @else
                            <p style="text-align: center; margin-top: 20px;">Paziņojumu nav</p>
                            </li>
                        @endif
                    </div>
                    <div class="latest_notifs_button">
                        <button type="button">
                            <a href="{{ route('notifications') }}">Visi paziņojumi</a></button>
                    </div>
                </div>
                <div class="latest_posts">
                    <div class="latest_posts_title">
                        Pēdējās piezīmes
                    </div>
                    <div class="latest_posts_panel">
                        @if (count($recent_posts) > 0)
                            @foreach ($recent_posts as $post)
                                <li class="profile_note_row">
                                    <div class="profile_note_post"><a href="{{ route('posts') }}/{{ $post->id }}">
                                            <h3>{{ $post->title }}</h3>
                                            <p class="timestamp">Izveidota: {{ $post->created_at->format('d-m-Y') }}</p>
                                        </a>
                                    </div>
                            @endforeach
                        @else
                            <p style="text-align: center; margin-top: 20px;">Piezīmju nav</p>
                            </li>
                        @endif
                    </div>
                    <div class="latest_notifs_button">
                        <button type="button">
                            <a href="{{ route('posts') }}">Visas piezīmes</a>
                        </button>
                    </div>
                </div>
            </div>
    </section>
    <script src={{ url('js/calendar.js') }}></script>
@endsection
