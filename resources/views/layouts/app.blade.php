<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/ee191d4cc6.js" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'IMG') }}</title>
    @livewireStyles
    @livewireScripts
    @powerGridStyles
</head>

<body class="font-poppins">
    <nav
        class="relative flex h-20 select-none items-center justify-between bg-white py-[1%] px-[4%] font-bold uppercase shadow-[0_2px_4px_0_rgba(0,0,0,.1)]">
        <a href="{{ route('profile') }}"><img src="/img/logo/logo.png" alt="Logo"
                class="block max-h-[75px] w-auto" /></a>
        <div
            class="navLinks max-lg:fixed max-lg:right-[-200px] max-lg:top-0 max-lg:h-full max-lg:w-[200px] max-lg:bg-white max-lg:text-left max-lg:shadow-md max-lg:duration-300">
            <i
                class="fa-solid fa-xmark close-menu mt-[20px] ml-[20px] block cursor-pointer text-[22px] text-black lg:hidden"></i>
            <ul class="p-[20px]">
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]"
                        href="{{ route('profile') }}">Profils</a></li>
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]"
                        href="{{ route('posts') }}">Piezīmes</a></li>
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]"
                        href="{{ route('notifications') }}">Paziņojumi</a></li>
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]"
                        href="{{ route('work') }}">Atskaites</a></li>
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]"
                        href="{{ route('objects') }}">Objekti</a></li>
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]" href="">Kontakti</a>
                </li>
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]" href="{{ route('logout') }}"><i
                            class="logout fa-solid fa-arrow-right-from-bracket"></i></li>
                </a>
            </ul>
        </div>
        <i class="fa-solid fa-bars open-menu text-[22px] lg:hidden"></i>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        asd
    </footer>
    <script>
        document.querySelector(".close-menu").addEventListener("click", () => {
            document.querySelector(".navLinks").style.right = "-200px";
        })

        document.querySelector(".open-menu").addEventListener("click", () => {
            document.querySelector(".navLinks").style.right = "0px";
        })
    </script>
    @powerGridScripts
</body>

</html>
