<div class="color-1 flex w-full flex-col rounded-[3px] p-[30px] shadow-md md:mr-[15px] md:w-1/2">
    <h3 class="text-xl font-semibold text-white">Pamata informācija</h3>
    <form wire:submit.prevent="update_profile_base">
        @csrf
        <div class="mb-[10px] flex flex-col">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                            onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                    </div>
                @endforeach
            @endif
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
