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
