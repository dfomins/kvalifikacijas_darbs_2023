<div class="section-min-height color-2 flex w-full flex-col items-center px-[20px] pb-[50px]">
    <h2 class="my-[40px] text-[25px] font-semibold tracking-wide">Profila iestaījumi</h2>
    {{-- 1 DALA, BAZES INFORMACIJA, PROFILA BILDE --}}
    <div class="flex w-[95%] flex-col justify-between md:flex-row xl:w-[1250px]">
        <div class="color-1 flex w-full flex-col rounded-[3px] p-[30px] shadow-md md:mr-[15px] md:w-1/2">
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
        <div
            class="color-1 mt-[50px] flex w-full flex-col rounded-[3px] p-[30px] shadow-md md:m-0 md:ml-[15px] md:w-1/2">
            <h3 class="mt-[20px] text-xl font-semibold text-white md:mt-0">Profila bilde</h3>
            @if (session('photo_success'))
                <div class="mt-[15px] rounded-[3px] bg-green-600 p-[10px] text-white" data-closable>
                    <i class="fa-solid fa-check"></i> Profila bilde veiksmīgi atjaunota! <button
                        onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                </div>
            @endif
            @if (session('delete_photo_success'))
                <div class="mt-[15px] rounded-[3px] bg-green-600 p-[10px] text-white" data-closable>
                    <i class="fa-solid fa-check"></i> Profila bilde tika dzēsta! <button
                        onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                </div>
            @endif
            @if ($image)
                <div
                    class="mx-auto mt-[15px] mb-[10px] h-[50vw] max-h-[250px] w-[50vw] max-w-[250px] rounded-full border border-solid border-black">
                    <img class="h-full w-full rounded-full object-cover" src="{{ $image }}"
                        alt="Profila bilde" />
                </div>
            @else
                <div
                    class="mx-auto mt-[15px] mb-[10px] h-[50vw] max-h-[250px] w-[50vw] max-w-[250px] rounded-full border border-solid border-black">
                    <img class="h-full w-full rounded-full object-cover"
                        src="{{ asset('storage/images/users/' . auth()->user()->profila_bilde) }}"
                        alt="Profila bilde" />
                </div>
            @endif
            @error('image')
                {{ $message }}
            @enderror
            <form class="flex flex-col" enctype="multipart/form-data" wire:submit.prevent="update_profile_photo">
                <input
                    class="mx-auto my-[10px] w-full cursor-pointer rounded-[3px] border-2 border-dashed p-[10px] text-white file:cursor-pointer file:outline-0"
                    id="image" name="image" type="file" wire:change="$emit('fileChoosen')">
                <div class="mx-auto mt-[10px] flex flex-col min-[420px]:block">
                    <button
                        class="cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4]"
                        type="submit">Saglabāt
                    </button>
                    <button wire:click="delete_profile_photo"
                        class="mt-[10px] cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4] min-[420px]:ml-[10px] min-[420px]:mt-0"
                        type="button">Dzēst
                        profila bildi
                    </button>
                </div>
            </form>
        </div>
    </div>



    {{-- 2 DALA, PAROLES MAINA --}}
    <div class="mt-[50px] flex w-[95%] justify-between rounded-[3px] bg-[#2b6777] p-[30px] shadow-md xl:w-[1250px]">
        <div class="flex w-full flex-col lg:w-1/2">
            <h3 class="text-xl font-semibold text-white">Paroles maiņa</h3>
            <form wire:submit.prevent="update_profile_password">
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
<script>
    window.livewire.on('fileChoosen', () => {

        let file = document.getElementById('image').files[0];
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result);
        }

        reader.readAsDataURL(file);

    });
</script>
