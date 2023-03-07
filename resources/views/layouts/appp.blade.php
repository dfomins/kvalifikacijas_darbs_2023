<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/ee191d4cc6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'IMG') }}</title>
    @livewireStyles
    @powerGridStyles
</head>

<body>
    <nav>
        <a href="{{ route('profile') }}"><img src="/img/logo/logo.png" alt="Logo" class="logo" /></a>
        <div class="nav-links nav-links-tel" id="navLinks">
            <i class="fa-solid fa-xmark close-menu"></i>
            <ul>
                <li><a href="{{ route('profile') }}">Profils</a></li>
                <li><a href="{{ route('posts') }}">Piezīmes</a></li>
                <li><a href="{{ route('notifications') }}">Paziņojumi</a></li>
                <li><a href="{{ route('work') }}">Atskaites</a></li>
                <li><a href="{{ route('objects') }}">Objekti</a></li>
                <li><a href="">Kontakti</a></li>
                <li><a href="{{ route('logout') }}"><i class="logout fa-solid fa-arrow-right-from-bracket"></i></li>
                </a>
            </ul>
        </div>
        <i class="fa-solid fa-bars open-menu"></i>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        asd
    </footer>
    <script src={{ url('js/side-navbar.js') }}></script>
    @livewireScripts
    @powerGridScripts
</body>

</html>
