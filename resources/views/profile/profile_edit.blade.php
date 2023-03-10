@extends('layouts.app')
@section('content')
    {{-- <div class="section-min-height color-2 mb-[50px] flex w-full flex-col items-center px-[20px]">
        <h2 class="my-[40px] text-[25px] font-semibold tracking-wide">Profila iestaījumi</h2>
        <div class="flex w-[1200px] rounded-[3px] bg-[#2b6777] p-[30px] shadow-md">
            <div class="flex w-1/2 flex-col">
                <h3 class="text-xl font-semibold text-white">Pamata informācija</h3> --}}
    @livewire('profile-settings')
    {{-- <form method="POST" action="{{ route('update_profile') }}" id="update_profile_form">
                    @csrf
                    <div class="mb-[10px] flex flex-col">
                        <label class="text-white" for="fname">Vārds</label>
                        <input
                            class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                            type="text" name="fname" value="{{ old('fname') ? old('fname') : $user->fname }}">
                        <span class="error text-white">
                            @error('fname', 'update_profile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-[10px] flex flex-col">
                        <label class="text-white" for="lname">Uzvārds</label>
                        <input
                            class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                            type="text" name="lname" value="{{ old('lname') ? old('lname') : $user->lname }}">
                        <span class="error text-white">
                            @error('lname', 'update_profile')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-white" for="email">E-pasts</label>
                        <input
                            class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                            type="email" name="email" value="{{ old('email') ? old('email') : $user->email }}">
                        <span class="error text-white">
                            @error('email', 'update_profile')
                                {{ $message }}
                            @enderror
                        </span>
                        @if (session('success'))
                            <span class="success mt-[10px] text-white">{{ session('success') }}</span>
                        @endif
                    </div>
                    <div>
                        <button
                            class="mt-[20px] cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4]"
                            type="submit" name="update_profile" class="">Saglabāt
                        </button>
                    </div>
                </form> --}}
    {{-- <div class="ml-[50px] flex flex-col">
                <h3 class="pb-[30px] text-xl font-semibold text-white">Profila bilde</h3>
                {!! Form::open([
                    'action' => 'App\Http\Controllers\ProfileController@update_profile',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                    'class' => 'flex flex-col items-center',
                ]) !!}
                <img class="h-[225px] w-[225px] rounded-full" src="{{ asset('img/users/' . $user->profila_bilde) }}"
                    alt="Profila bilde" />
                <div class="mx-[30px] flex flex-col items-center">
                    {{ Form::file('profila_bilde', ['class' => 'text-white text-center', 'accept' => 'image/*']) }}
                    <span class="error text-white">
                        @error('profila_bilde', 'update_image')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="image_edit_submit_button">
                        {{ Form::submit('Mainīt', ['name' => 'update_image', 'class' => 'cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4]']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div> --}}


    {{-- <div class="mt-[50px] w-[1200px] rounded-[3px] bg-[#2b6777] p-[30px] shadow-md">
            <h3 class="pb-[30px] text-xl font-semibold text-white">Paroles maiņa</h3>
            <form class="flex w-2/3 flex-col" method="POST" action="{{ route('update_profile') }}"
                id="update_password_form">
                @csrf
                <div class="mb-[10px] flex flex-col">
                    <label class="text-white" for="old_password">Vecā parole</label>
                    <input
                        class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                        type="password" name="old_password">
                    <span class="error text-white">
                        @error('old_password', 'update_password')
                            {{ $message }}
                        @enderror
                    </span>
                    @if (session('error'))
                        <span class="error">{{ session('error') }}</span>
                    @endif
                </div>
                <div class="mb-[10px] flex flex-col">
                    <label class="text-white" for="new_password">Jauna parole</label>
                    <input
                        class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                        type="password" name="new_password">
                    <span class="error text-white">
                        @error('new_password', 'update_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="flex flex-col">
                    <label class="text-white" for="confirm_password">Apstipriniet paroli</label>
                    <input
                        class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                        type="password" name="confirm_password">
                    <span class="error text-white">
                        @error('confirm_password', 'update_password')
                            {{ $message }}
                        @enderror
                    </span>
                    @if (session('success'))
                        <span class="success mt-[10px] text-white">{{ session('success') }}</span>
                    @endif
                </div>
                <div>
                    <button
                        class="mt-[20px] cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4]"
                        type="submit" name="update_password">Atjaunot
                    </button>
                </div>
            </form>
        </div> --}}

    {{-- <div class="password_change profile_edit_page" data-page="2">
                        <form method="POST" action="{{ route('update_profile') }}" id="update_password_form">
                            <h3>Paroles maiņa</h3>
                            @csrf
                            <label for="old_password">Vecā parole</label>
                            <input type="password" name="old_password">
                            <span class="error">
                                @error('old_password', 'update_password')
                                    {{ $message }}
                                @enderror
                            </span>
                            @if (session('error'))
                                <span class="error">{{ session('error') }}</span>
                            @endif
                            <label for="new_password">Jauna parole</label>
                            <input type="password" name="new_password">
                            <span class="error">
                                @error('new_password', 'update_password')
                                    {{ $message }}
                                @enderror
                            </span>
                            <label for="confirm_password">Apstipriniet paroli</label>
                            <input type="password" name="confirm_password">
                            <span class="error">
                                @error('confirm_password', 'update_password')
                                    {{ $message }}
                                @enderror
                            </span>
                            @if (session('success'))
                                <span class="success">{{ session('success') }}</span>
                            @endif
                            <button type="submit" name="update_password" class="setting_row_button">Atjaunot</button>
                        </form>
                    </div>
                    <div class="profile_photo profile_edit_page" data-page="3">
                        <h3>Profila bilde</h3>
                        {!! Form::open([
                            'action' => 'App\Http\Controllers\ProfileController@update_profile',
                            'method' => 'POST',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        <img src="{{ asset('img/users/' . $user->profila_bilde) }}" alt="Profila bilde" />
                        <div class="drop_profile_image">
                            {{ Form::file('profila_bilde', ['class' => 'profile_image_edit', 'accept' => 'image/*']) }}
                            <span class="error">
                                @error('profila_bilde', 'update_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="image_edit_submit_button">
                            {{ Form::submit('Mainīt', ['name' => 'update_image', 'class' => 'setting_row_button']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <script src="{{ url('js/profile_settings.js') }}"></script> --}}
@endsection
