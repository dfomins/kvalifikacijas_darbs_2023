<div class="color-1 mt-[50px] flex w-full flex-col rounded-[3px] p-[30px] shadow-md">
    <h3 class="text-xl font-semibold text-white">Papildus informācija</h3>
    <div class="w-2/3 max-lg:w-full">
        <form wire:submit.prevent="update_profile_additional">
            @csrf
            <div class="flex flex-col">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="mt-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                                onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                        </div>
                    @endforeach
                @endif
                <label class="pt-[15px] text-white" for="personal_code">Personas kods</label>
                <input
                    class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                    wire:model.defer="personal_code" type="text" name="personal_code">
            </div>
            <div class="flex flex-col">
                <label class="pt-[15px] text-white" for="date_of_birth">Dzimšanas datums</label>
                <input
                    class="my-[5px] cursor-pointer rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                    id="datepicker" wire:model.defer="date_of_birth" type="date" name="date_of_birth">
            </div>
            <div class="flex flex-col">
                <label class="pt-[15px] text-white" for="city">Pilsēta</label>
                <input
                    class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                    wire:model.defer="city" type="text" name="city">
            </div>
            <div class="flex flex-col">
                <label class="pt-[15px] text-white" for="street">Iela</label>
                <input
                    class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                    wire:model.defer="street" type="text" name="street">
            </div>
            <div class="flex flex-col">
                <label class="pt-[15px] text-white" for="house_number">Mājas numurs</label>
                <input
                    class="my-[5px] rounded-[3px] border border-solid border-black p-[10px] text-[18px] text-black outline-0"
                    wire:model.defer="house_number" type="text" name="house_number">
            </div>
            <div>
                <button
                    class="mt-[20px] cursor-pointer rounded-[3px] bg-white py-[10px] px-[15px] text-black duration-300 hover:bg-[#c8d8e4]"
                    type="submit">Saglabāt
                </button>
            </div>
        </form>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    <script>
        flatpickr("#datepicker", {
            'locale': 'lv',
            'dateFormat': "d/m/Y",
            'maxDate': new Date().fp_incr(-6574)
        });
    </script>
</div>
