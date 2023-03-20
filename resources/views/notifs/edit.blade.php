@extends('layouts.app')

@section('content')
    <div class="section-min-height flex w-full justify-center bg-[#f2f2f2]">
        <div class="max-h-[70%] w-[100%] rounded-[3px] py-[70px] px-[20px] sm:px-[40px] md:w-[80%] lg:w-[60%]">
            <div class="pb-[20px]">
                <a href="{{ route('notifications') }}/{{ $notif->id }}">
                    <button
                        class="cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[20px] text-white duration-300 hover:bg-[#52ab98]">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i> Atpakaļ
                    </button>
                </a>
            </div>
            <div class="mb-[10px] flex justify-center text-white">
                <h3 class="text-xl font-semibold text-black">Rediģēt paziņojumu #{{ $notif->id }}</h3>
            </div>
            {{-- <div> --}}
            {!! Form::open([
                'action' => ['App\Http\Controllers\NotifsController@update', $notif->id],
                'method' => 'PUT',
                'class' => 'flex flex-col text-white',
            ]) !!}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                            onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                    </div>
                @endforeach
            @endif
            {{ Form::label('title', 'Nosaukums', ['class' => 'pt-[15px] text-black']) }}
            {{ Form::text('title', $notif->title, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px']) }}
            {{ Form::label('body', 'Saturs', ['class' => 'pt-[15px] text-black']) }}
            {{ Form::textarea('body', $notif->body, ['class' => 'text-black p-[10px] rounded-[3px] border border-solid border-black outline-0 my-[5px] text-16px resize-none']) }}
            <div>
                {{ Form::submit('Apstiprināt', ['class' => 'cursor-pointer rounded-[3px] bg-[#2b6777] py-[10px] px-[15px] mt-[20px] duration-300 hover:bg-[#52ab98]']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
