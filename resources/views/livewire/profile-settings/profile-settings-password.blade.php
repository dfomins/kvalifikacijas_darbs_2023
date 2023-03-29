<div class="color-1 mt-[50px] flex w-full flex-col rounded-[3px] p-[30px] shadow-md">
    <h3 class="text-xl font-semibold text-white">Paroles maiņa</h3>
    <div class="w-2/3 max-lg:w-full">
        <form wire:submit.prevent="update_profile_password">
            @csrf
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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                            onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                    </div>
                @endforeach
            @endif
            <div class="mb-[10px] flex flex-col">
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
