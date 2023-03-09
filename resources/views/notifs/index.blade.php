@extends('layouts.app')

@section('content')
    <div class="section-min-height flex w-full flex-col items-center bg-[#f2f2f2] px-[20px] pb-[30px]">
        <h2 class="my-[40px] text-[25px] font-semibold tracking-wide">Paziņojumi</h2>
        <div
            class="mb-[20px] h-[65vh] w-full justify-center overflow-y-auto text-white scrollbar-thin scrollbar-thumb-[#3c3e3a] lg:w-[80%] xl:w-[70%]">
            <ol>
                @if (count($notifs) > 0)
                    @foreach ($notifs as $notif)
                        @if ($loop->last)
                            <a class="text-white" href="{{ route('notifications') }}/{{ $notif->id }}">
                                <li class="flex w-full bg-[#2b6777] p-[10px] duration-300 hover:bg-[#2b6777ef]">
                                    <div>
                                        <h3>{{ $notif->title }}</h3>
                                        <p>Izveidots: {{ $notif->created_at->format('d-m-Y') }}</p>
                                    </div>
                                </li>
                            </a>
                        @else
                            <a class="text-white" href="{{ route('notifications') }}/{{ $notif->id }}">
                                <li class="mb-[10px] flex w-full bg-[#2b6777] p-[10px] duration-300 hover:bg-[#2b6777ef]">
                                    <div>
                                        <h3>{{ $notif->title }}</h3>
                                        <p>Izveidots: {{ $notif->created_at->format('d-m-Y') }}</p>
                                    </div>
                                </li>
                            </a>
                        @endif
                    @endforeach
                @else
                    <p class="text-center text-black">Paziņojumu nav</p>
                    </li>
                @endif
            </ol>
        </div>
        @if (Auth::user()->role_id == 1)
            <a href="{{ route('notifications') }}/jauns"><button
                    class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] text-center text-white duration-300 hover:bg-[#52ab98]">Izveidot
                    jaunu</button>
            </a>
        @endif
    </div>
@endsection
