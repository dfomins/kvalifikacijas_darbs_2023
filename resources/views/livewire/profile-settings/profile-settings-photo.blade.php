<div class="color-1 mt-[50px] flex w-full flex-col rounded-[3px] p-[30px] shadow-md md:m-0 md:ml-[15px] md:w-1/2">
    <h3 class="mt-[20px] text-xl font-semibold text-white md:mt-0">Profila bilde</h3>
    <form class="flex flex-col" enctype="multipart/form-data" wire:submit.prevent="update_profile_photo">
        @csrf
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
                <img class="h-full w-full rounded-full object-cover" src="{{ $image }}" alt="Profila bilde" />
            </div>
        @else
            <div
                class="mx-auto mt-[15px] mb-[10px] h-[50vw] max-h-[250px] w-[50vw] max-w-[250px] rounded-full border border-solid border-black">
                <img class="h-full w-full rounded-full object-cover"
                    src="{{ asset('storage/images/users/' . auth()->user()->profila_bilde) }}" alt="Profila bilde" />
            </div>
        @endif
        @error('image')
            {{ $message }}
        @enderror
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
