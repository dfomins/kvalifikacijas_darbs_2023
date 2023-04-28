@extends('layouts.app')

@section('title')
    {{ 'Profils' }}
@endsection

@section('content')
    <section class="section-min-height flex justify-center bg-[#f2f2f2]">
        <div
            class="mt-[50px] mb-[100px] grid w-[1200px] grid-cols-1 max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90%] lg:grid-cols-3">
            <div class="col-span-1 m-0">
                <div class="color-3 rounded-[3px] px-[30px] py-[50px] text-white">
                    <h2 class="mb-[15px] text-center text-[25px] font-bold">{{ auth()->user()->fname }}
                        {{ auth()->user()->lname }}
                    </h2>
                    <h3 class="my-[15px] text-center text-[20px] font-medium">{{ $user->role->name }}</h3>
                    <div
                        class="mx-auto my-[10px] h-[50vw] max-h-[250px] w-[50vw] max-w-[250px] rounded-full border border-solid border-black">
                        <img class="h-full w-full rounded-full object-cover"
                            src="{{ asset('storage/images/users/' . auth()->user()->profila_bilde) }}" alt="Profila bilde" />
                    </div>
                    <div class="text-center">
                        Mani darba objekti:
                        @if (!$user->objects->isEmpty())
                            @foreach ($user->objects as $list)
                                {{ $list->id }}{{ $loop->last ? '' : ',' }}
                            @endforeach
                        @else
                            nav
                        @endif
                    </div>
                    <div class="text-center text-[18px] leading-[3]">
                        <a class="group" href="{{ route('edit_profile') }}">Profila iestatījumi <i
                                class="fa-solid fa-gear duration-300 group-hover:rotate-45"></i></a>
                        @if (Auth::user()->role_id == 1)
                            <a class="group" href="registracija">
                                <p>Izveidot jaunu lietotāji <i class="fa-solid fa-user"></i><i
                                        class="fa-solid fa-plus mb-[5px] align-middle text-[10px] duration-300 group-hover:rotate-90"></i>
                                </p>
                            </a>
                            <a class="group" href="{{ route('allusers') }}">
                                <p>Visi lietotāji <i class="fa-solid fa-users duration-300 group-hover:scale-[110%]"></i>
                                </p>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-span-2 max-lg:mt-[50px]">
                <div
                    class="shadow-[rgba(0, 0, 0, 0.1) 0px 4px 12px] ml-[100px] h-[300px] rounded-[2px] bg-[#52ab98] max-lg:m-0">
                    <div
                        class="flex h-[70px] flex-col items-center justify-center bg-[#2b6777] font-bold uppercase text-white">
                        <p class="day"></p>
                        <p class="date"></p>
                    </div>
                    <div class="flex h-[230px] flex-col items-center justify-center text-[5.5vw] text-white sm:text-[25px]">
                        </p>Nostrādātās stundas:
                        {{ $user->work->where('date', Carbon\Carbon::now()->format('d/m/Y'))->first() != null ? $user->work->where('date', Carbon\Carbon::now()->format('d/m/Y'))->first()->hours : '' }}
                        </p>
                    </div>
                </div>
                <div
                    class="shadow-[rgba(0, 0, 0, 0.1) 0px 4px 12px] ml-[100px] mt-[30px] min-h-[345px] rounded-[3px] bg-[#52ab98] text-[20px] max-lg:mx-0">
                    <div
                        class="flex h-[70px] flex-col items-center justify-center bg-[#2b6777] font-bold uppercase text-white">
                        Pēdējie paziņojumi
                    </div>
                    <div class="min-h-[220px] overflow-y-auto">
                        @if (count($recent_notifs) > 0)
                            @foreach ($recent_notifs as $notif)
                                <li class="m-[10px] list-none rounded-[2px] bg-white p-[5px] text-[15px]">
                                    <div class="whitespace-nowrap">
                                        <a href="{{ route('notifications') }}/{{ $notif->id }}">
                                            <h3 class="truncate">{{ $notif->title }}</h3>
                                            <p>Izveidota: {{ $notif->created_at->format('d-m-Y') }}</p>
                                        </a>
                                    </div>
                            @endforeach
                        @else
                            <p class="mt-[20px] text-center text-white">Paziņojumu nav</p>
                            </li>
                        @endif
                    </div>
                    <div class="mt-[5px] flex items-center justify-center">
                        <button
                            class="cursor-pointer rounded-[3px] bg-white py-[3px] px-[5px] text-center text-base duration-300 hover:bg-[#c8d8e4]"
                            type="button">
                            <a href="{{ route('notifications') }}">Visi paziņojumi</a>
                        </button>
                    </div>
                </div>
                <div
                    class="shadow-[rgba(0, 0, 0, 0.1) 0px 4px 12px] mt-[30px] ml-[100px] min-h-[345px] rounded-[3px] bg-[#52ab98] text-[20px] max-lg:mx-0">
                    <div
                        class="flex h-[70px] flex-col items-center justify-center bg-[#2b6777] font-bold uppercase text-white">
                        Pēdējās piezīmes
                    </div>
                    <div class="min-h-[220px] overflow-y-auto">
                        @if (count($recent_posts) > 0)
                            @foreach ($recent_posts as $post)
                                <li class="m-[10px] list-none rounded-[2px] bg-white p-[5px] text-[15px]">
                                    <div class="whitespace-nowrap">
                                        <a href="{{ route('posts') }}/{{ $post->id }}">
                                            <h3 class="truncate">{{ $post->title }}</h3>
                                            <p>Izveidota: {{ $post->created_at->format('d-m-Y') }}</p>
                                        </a>
                                    </div>
                            @endforeach
                        @else
                            <p class="mt-[20px] text-center text-white">Piezīmju nav</p>
                            </li>
                        @endif
                    </div>
                    <div class="mt-[5px] flex items-center justify-center">
                        <button
                            class="cursor-pointer rounded-[3px] bg-white py-[3px] px-[5px] text-center text-base duration-300 hover:bg-[#c8d8e4]"
                            type="button">
                            <a href="{{ route('posts') }}">Visas piezīmes</a>
                        </button>
                    </div>
                </div>
            </div>
    </section>
    <script src={{ url('js/calendar.js') }}></script>
@endsection
