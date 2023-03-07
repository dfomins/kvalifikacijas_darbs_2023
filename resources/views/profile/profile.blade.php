@extends('layouts.app')

@section('content')
    <section class="section-min-height flex justify-center bg-[#52ab98]">
        <div class="grid w-[1200px] grid-cols-1 lg:grid-cols-3">
            <div class="col-span-1 m-0 p-[30px] lg:my-[30px] lg:mx-[20px]">
                <h2 class="my-[15px] text-center text-[25px] font-bold text-white">{{ auth()->user()->fname }}
                    {{ auth()->user()->lname }}
                </h2>
                <h3 class="my-[15px] text-center text-[20px] font-medium text-white">{{ $user->role->name }}</h3>
                <img class="my-[10px] mx-auto h-64 w-64 rounded-full border border-solid border-black"
                    src="{{ asset('img/users/' . auth()->user()->profila_bilde) }}" alt="Profila bilde" />
                <div class="text-center text-[18px] leading-[3] text-white">
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
            <div class="col-span-2 my-[30px] mx-[20px]">
                <div class="shadow-[rgba(0, 0, 0, 0.1) 0px 4px 12px] m-0 h-[300px] rounded-[2px] bg-white sm:mx-[50px]">
                    <div
                        class="flex h-[70px] flex-col items-center justify-center bg-[#2b6777] font-bold uppercase text-white">
                        <p class="day"></p>
                        <p class="date"></p>
                    </div>
                    <div class="flex h-[230px] flex-col items-center justify-center text-[5.5vw] sm:text-[25px]">
                        <p>Statuss:</p>
                        </p>Nostrādātās stundas:</p>
                    </div>
                </div>
                <div
                    class="shadow-[rgba(0, 0, 0, 0.1) 0px 4px 12px] m-0 mt-[30px] min-h-[345px] rounded-[3px] bg-white text-[20px] sm:mx-[50px]">
                    <div
                        class="flex h-[70px] flex-col items-center justify-center bg-[#2b6777] font-bold uppercase text-white">
                        Pēdējie paziņojumi
                    </div>
                    <div class="min-h-[220px] overflow-y-auto">
                        @if (count($recent_notifs) > 0)
                            @foreach ($recent_notifs as $notif)
                                <li class="m-[10px] list-none rounded-[3px] bg-[#2b6777] p-[5px] text-[15px]">
                                    <div class="text-white"><a href="{{ route('notifications') }}/{{ $notif->id }}">
                                            <h3>{{ $notif->title }}</h3>
                                            <p>Izveidota: {{ $notif->created_at->format('d-m-Y') }}</p>
                                        </a>
                                    </div>
                            @endforeach
                        @else
                            <p style="text-align: center; margin-top: 20px;">Paziņojumu nav</p>
                            </li>
                        @endif
                    </div>
                    <div class="mt-[5px] flex items-center justify-center">
                        <button
                            class="cursor-pointer rounded-[3px] border border-black bg-white py-[3px] px-[5px] text-center text-base duration-300 hover:bg-[#c8d8e4]"
                            type="button">
                            <a href="{{ route('notifications') }}">Visi paziņojumi</a>
                        </button>
                    </div>
                </div>
                <div
                    class="shadow-[rgba(0, 0, 0, 0.1) 0px 4px 12px] m-0 mt-[30px] min-h-[345px] rounded-[3px] bg-white text-[20px] sm:mx-[50px]">
                    <div
                        class="flex h-[70px] flex-col items-center justify-center bg-[#2b6777] font-bold uppercase text-white">
                        Pēdējās piezīmes
                    </div>
                    <div class="min-h-[220px] overflow-y-auto">
                        @if (count($recent_posts) > 0)
                            @foreach ($recent_posts as $post)
                                <li class="m-[10px] list-none rounded-[3px] bg-[#2b6777] p-[5px] text-[15px]">
                                    <div class="text-white"><a href="{{ route('posts') }}/{{ $post->id }}">
                                            <h3>{{ $post->title }}</h3>
                                            <p>Izveidota: {{ $post->created_at->format('d-m-Y') }}</p>
                                        </a>
                                    </div>
                            @endforeach
                        @else
                            <p style="text-align: center; margin-top: 20px;">Piezīmju nav</p>
                            </li>
                        @endif
                    </div>
                    <div class="mt-[5px] flex items-center justify-center">
                        <button
                            class="cursor-pointer rounded-[3px] border border-black bg-white py-[3px] px-[5px] text-center text-base duration-300 hover:bg-[#c8d8e4]"
                            type="button">
                            <a href="{{ route('posts') }}">Visas piezīmes</a>
                        </button>
                    </div>
                </div>
            </div>
    </section>
    <script src={{ url('js/calendar.js') }}></script>
@endsection
