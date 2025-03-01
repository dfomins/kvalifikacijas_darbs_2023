<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="storage/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/ee191d4cc6.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    @livewireStyles
    @livewireScripts
</head>

<body class="font-poppins">
    <nav
        class="flex h-20 select-none items-center justify-between bg-white py-[1%] px-[4%] font-bold uppercase shadow-[0_2px_4px_0_rgba(0,0,0,.1)]">
        <a href="{{ route('profile') }}"><img src="/img/logo/logo.png" alt="Logo"
                class="block max-h-[75px] w-auto" /></a>
        <div
            class="navLinks max-[1050px]:fixed max-[1050px]:right-[-200px] max-[1050px]:top-0 max-[1050px]:h-full max-[1050px]:w-[200px] max-[1050px]:bg-white max-[1050px]:text-left max-[1050px]:shadow-md max-[1050px]:duration-300">
            <i
                class="fa-solid fa-xmark close-menu mt-[20px] ml-[20px] block cursor-pointer text-[22px] text-black min-[1050px]:hidden"></i>
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
                @if (Auth::user()->role_id == 1)
                    <li class="relative inline-block py-[10px] px-[12px]"><a
                            class="tracking-widest duration-300 hover:text-[#52ab98]"
                            href="{{ route('isAdmin.work') }}">Atskaites</a></li>
                    <li class="relative inline-block py-[10px] px-[12px]"><a
                            class="tracking-widest duration-300 hover:text-[#52ab98]"
                            href="{{ route('isAdmin.workshow') }}">Darbs</a></li>
                @elseif (Auth::user()->role_id == 2)
                    <li class="relative inline-block py-[10px] px-[12px]"><a
                            class="tracking-widest duration-300 hover:text-[#52ab98]"
                            href="{{ route('isForeman.work') }}">Atskaites</a></li>
                @endif
                @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                    <li class="relative inline-block py-[10px] px-[12px]"><a
                            class="tracking-widest duration-300 hover:text-[#52ab98]"
                            href="{{ route('isForemanOrUser.workshow') }}">Darbs</a></li>
                @endif
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]"
                        href="{{ route('objects') }}">Objekti</a></li>
                <li class="relative inline-block py-[10px] px-[12px]"><a
                        class="tracking-widest duration-300 hover:text-[#52ab98]" href="{{ route('logout') }}"><i
                            class="logout fa-solid fa-arrow-right-from-bracket"></i></li>
                </a>
            </ul>
        </div>
        <i class="fa-solid fa-bars open-menu text-[22px] min-[1050px]:hidden"></i>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="color-3 flex min-h-[300px] justify-center shadow-md">
        <div
            class="my-[40px] grid w-[1200px] grid-cols-4 gap-x-10 text-white max-xl:w-[900px] max-[1050px]:w-[700px] max-[1050px]:grid-cols-1 max-md:w-[580px] max-sm:w-[90%] max-sm:gap-0">
            <div class="col-span-2 max-sm:mb-[20px] max-[420px]:col-span-1">
                <h3 class="text-[20px] font-semibold">Par mums</h3>
                <p class="mt-[10px]">Intek - moderns portāls, lai jūs varētu veidot darba atskaites savā uzņēmumā.
                    Viegla atskaišu sistēma ļaus atzīmēt stundu skaitu katram darbiniekam pāris minūšu garumā.</p>
            </div>
            <div class="max-[420px]:mb-[20px]">
                <h3 class="text-[20px] font-semibold">Saites</h3>
                <ol class="mt-[10px]">
                    <li><a href="{{ route('profile') }}">Profils</a></li>
                    <li><a href="{{ route('posts') }}">Piezīmes</a></li>
                    <li><a href="{{ route('notifications') }}">Paziņojumi</a></li>
                    @if (Auth::user()->role_id == 1)
                        <li><a href="{{ route('isAdmin.work') }}">Atskaites</a></li>
                        <li><a href="{{ route('isAdmin.workshow') }}">Darbs</a></li>
                    @elseif (Auth::user()->role_id == 2)
                        <li><a href="{{ route('isForeman.work') }}">Atskaites</a></li>
                    @endif
                    @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                        <li><a href="{{ route('isForemanOrUser.workshow') }}">Darbs</a></li>
                    @endif
                </ol>
            </div>
            <div>
                <h3 class="text-[20px] font-semibold">Kontakti</h3>
                <div class="mt-[10px]">
                    <div class="flex items-center">
                        <i class="fa-solid fa-phone mr-[15px] mt-[5px] mb-[5px] text-[25px]"></i>+371 12345678
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-envelope mt-[5px] mr-[15px] mb-[5px] text-[25px]"></i>info@intek.lv
                    </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-location-dot mr-[15px] text-[25px]"></i>Krišjāņa Valdemāra iela 1C, Centra
                        rajons, Rīga, LV-1010
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/side-navbar.js"></script>
    @include('sweetalert::alert')
</body>

</html>
