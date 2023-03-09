@extends('layouts.app')

@section('content')
    <div class="note_panel section-min-height flex w-full flex-col items-center bg-[#52ab98] px-[20px] pb-[30px]">
        <h2 class="my-[40px] text-[25px] font-semibold tracking-wide text-white">Paziņojumi</h2>
        <div class="thread_panel mb-[20px] h-[65vh] w-full justify-center overflow-y-auto text-white lg:w-[80%] xl:w-[70%]">
            <ol>
                @if (count($notifs) > 0)
                    @foreach ($notifs as $notif)
                        <a class="text-black" href="{{ route('notifications') }}/{{ $notif->id }}">
                            <li class="note_row mb-[10px] flex w-full bg-[#FCFCFC] p-[10px]">
                                <div class="note_post">
                                    <h3>{{ $notif->title }}</h3>
                                    <p>Izveidots: {{ $notif->created_at->format('d-m-Y') }}</p>
                                </div>
                            </li>
                        </a>
                    @endforeach
                @else
                    <p class="text-center">Paziņojumu nav</p>
                    </li>
                @endif
            </ol>
        </div>
        @if (Auth::user()->role_id == 1)
            <a href="{{ route('notifications') }}/jauns"><button
                    class="cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-center duration-300 hover:bg-[#c8d8e4]">Izveidot
                    jaunu</button>
            </a>
        @endif
    </div>
@endsection
