<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ee191d4cc6.js" crossorigin="anonymous"></script>

    <title>{{ config('app.name', 'IMG') }}</title>
</head>

<body>
    <nav>
        <a href="{{ route('profile') }}"><img src="/img/logo-white.png" alt="Logo" class="logo" /></a>
        <div class="nav-links nav-links-tel" id="navLinks">
            <i class="fa-solid fa-xmark closeMenu"></i>
            <ul>
                <li><a href="{{ route('profile') }}">Profils</a></li>
                <div class="dropdown">
                    <li class="dropbtn">Piezīmes</li>
                    <div class="dropdown-content">
                        <li><a href="/posts">Privātās</a></li>
                        <li><a href="/notifications">Paziņojumi</a></li>
                    </div>
                </div>
                <li><a href="/work">Atskaites</a></li>
                <li><a href="/objects">Objekti</a></li>
                <li><a href="/contacts">Kontakti</a></li>
                <li><a href="/logout">Iziet</a></li>
            </ul>
        </div>
        <i class="fa-solid fa-bars openMenu"></i>
    </nav>
    <main>
        @yield('content')
    </main>
    {{-- <footer>
        asd
    </footer> --}}
</body>

</html>
<script src={{ url('js/calendar.js') }}></script>
<script src={{ url('js/side-navbar.js') }}></script>
<script src={{ url('js/pfp.js') }}></script>
