<div class="section-min-height color-2 mb-[50px] flex w-full flex-col items-center px-[20px]">
    <h2 class="my-[40px] text-[25px] font-semibold tracking-wide">Profila iestaījumi</h2>
    {{-- 1 DALA, BAZES INFORMACIJA, PROFILA BILDE --}}
    <div
        class="flex w-[95%] flex-col justify-between rounded-[3px] bg-[#2b6777] p-[30px] shadow-md md:flex-row xl:w-[1250px]">
        <div class="flex w-full flex-col md:w-2/5">
            <h3 class="text-xl font-semibold text-white">Pamata informācija</h3>
            <form wire:submit.prevent="update_profile_base">
                @csrf
                <div class="mb-[10px] flex flex-col">
                    @if (session('base_success'))
                        <div class="mt-[15px] rounded-[3px] bg-green-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-check"></i> Informācija veiksmīgi atjaunota! <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @endif
                    @error('fname')
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @enderror
                    @error('lname')
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @enderror
                    @error('email')
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @enderror
                    <label class="pt-[15px] text-white" for="fname">Vārds</label>
                    <input
                        class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                        wire:model.defer="fname" type="text" name="fname">
                    <div class="mb-[10px] flex flex-col">
                        <label class="text-white" for="lname">Uzvārds</label>
                        <input
                            class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                            wire:model.defer="lname" type="text" name="lname">
                    </div>
                    <div class="flex flex-col">
                        <label class="text-white" for="email">E-pasts</label>
                        <input
                            class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                            wire:model.defer="email" type="email" name="email">
                    </div>
                    <div>
                        <button
                            class="mt-[20px] cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4]"
                            type="submit">Saglabāt
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex w-2/5 flex-col">

        </div>
    </div>
    {{-- 2 DALA, PAROLES MAINA --}}
    <div class="mt-[50px] flex w-[95%] justify-between rounded-[3px] bg-[#2b6777] p-[30px] shadow-md xl:w-[1250px]">
        <div class="flex w-full flex-col md:w-1/2">
            <h3 class="text-xl font-semibold text-white">Paroles maiņa</h3>
            <form wire:submit.prevent="update_profile_password">
                {{-- id="update_password_form" --}}
                @csrf
                <div class="mb-[10px] flex flex-col">
                    @if (session('password_success'))
                        <div class="mt-[15px] rounded-[3px] bg-green-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-check"></i> Parole tika veiksmīgi atjaunota! <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @endif
                    @if (session('password_error'))
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> Vecā parole tika nepareizi ievadīta <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @endif
                    @error('old_password')
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @enderror
                    @error('new_password')
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @enderror
                    @error('confirm_password')
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @enderror
                    <label class="pt-[15px] text-white" for="old_password">Vecā parole</label>
                    <input
                        class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                        wire:model.defer="old_password" type="password" name="old_password">
                </div>
                <div class="mb-[10px] flex flex-col">
                    <label class="text-white" for="new_password">Jauna parole</label>
                    <input
                        class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                        wire:model.defer="new_password" type="password" name="new_password">
                </div>
                <div class="flex flex-col">
                    <label class="text-white" for="confirm_password">Apstipriniet paroli</label>
                    <input
                        class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                        wire:model.defer="confirm_password" type="password" name="confirm_password">
                </div>
                <div>
                    <button
                        class="mt-[20px] cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4]"
                        type="submit">Atjaunot
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
