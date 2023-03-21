@extends('layouts.app')

@section('title')
    {{ 'Apskatīt paziņojumu' }}
@endsection

@section('content')
    <div class="section-min-height w-full overflow-y-auto bg-[#f2f2f2]">
        <div class="flex min-h-[100px] w-full items-center bg-[#2b6777] px-[20px] py-[20px] text-white sm:px-[20%]">
            <a href="{{ route('notifications') }}">
                <div
                    class="mr-[3vw] flex h-[30px] w-[30px] cursor-pointer items-center justify-center rounded-full bg-[#1B9AAA] text-center md:mr-[15px]">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                </div>
            </a>
            <div class="inline-flex w-[calc(100%-(3vw+35px))] sm:w-full">
                <div class="inline-block w-full overflow-hidden">
                    <h1 class="break-all text-[20px]"">{{ $notif->title }}</h1>
                    <p class="truncate text-[15px]">{{ $notif->created_at->format('d-m-Y | H:i') }} ||
                        {{ $notif->user->fname }}
                        {{ $notif->user->lname }}</p>
                </div>
                @if (Auth::user()->role_id == 1)
                    <div class="flex cursor-pointer items-center justify-center">
                        <a href="{{ route('notifications') }}/{{ $notif->id }}/rediget"><i
                                class="fa-solid fa-pen-to-square fa-lg ml-[15px]"></i></a>
                        {!! Form::open([
                            'action' => ['App\Http\Controllers\NotifsController@destroy', $notif->id],
                            'method' => 'DELETE',
                        ]) !!}
                        {{ Form::button('<i class="fa-solid fa-trash fa-xl ml-[15px]"></i>', ['type' => 'submit']) }}
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="my-[20px] break-all px-[20px] sm:px-[20%]">
            <p>{{ $notif->body }}</p>
        </div>
    </div>
@endsection
