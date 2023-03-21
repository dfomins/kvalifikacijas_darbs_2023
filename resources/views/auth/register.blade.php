@extends('auth.layouts.app')

@section('title')
    {{ 'Reģistrācija' }}
@endsection

@section('content')
    <div style="background-image: url(/img/backgrounds/login_bg_2.jpg);" class="flex min-h-[100vh] bg-cover bg-center">
        <div class="m-auto w-[400px] flex-col items-center max-[470px]:w-[90%]">
            <img class="mx-auto h-[150px] w-[150px] text-center" src="/img/logo/logo.png" alt="Logo" />
            <h1 class="text-center text-[30px] font-semibold max-[470px]:text-[6.3vw]">Reģistrācija</h1>
            <form class="flex flex-col" method="POST" action="{{ route('register') }}">
                @csrf

                @if ($errors->any())
                    @if (count($errors) > 3)
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> Vairāki nosacījumi nav izpildīti! <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @else
                        @foreach ($errors->all() as $error)
                            <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                                <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                                    onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                            </div>
                        @endforeach
                    @endif
                @endif

                <input
                    class="mt-[15px] mb-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    type="text" name="fname" placeholder="Vārds" value="{{ old('fname') }}" />

                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    type="text" name="lname" placeholder="Uzvārds" value="{{ old('lname') }}" />

                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    type="text" name="email" placeholder="E-pasts" value="{{ old('email') }}" />

                <select
                    class="my-[10px] h-[50px] w-full cursor-pointer appearance-none rounded-[3px] border border-black bg-[url('https://www.svgrepo.com/show/80156/down-arrow.svg')] bg-[length:14px_14px] bg-[calc(100%-16px)] bg-no-repeat p-[10px] text-[18px] outline-0"
                    name="role_id">
                    <option value="none" selected disabled hidden>Izvēlieties lomu</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    id="password" type="password" name="password" placeholder="Parole" autocomplete="new-password" />

                <input class="my-[10px] h-[50px] w-full rounded-[3px] border border-black p-[10px] text-[18px] outline-0"
                    id="password" type="password" name="password_confirmation" placeholder="Apstipriniet paroli"
                    autocomplete="new-password" />
                <div class="text-center">
                    <button
                        class="my-[15px] cursor-pointer rounded-[3px] border border-black bg-white py-[10px] px-[30px] text-[18px] duration-300 hover:bg-[#c8d8e4]"
                        type="submit" name="button" id="btn">Reģistrēt
                    </button>
                </div>
            </form>
            <div class="text-center">
                <a href="{{ route('profile') }}">Uz profilu</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
