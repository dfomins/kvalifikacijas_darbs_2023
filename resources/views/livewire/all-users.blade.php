<div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="mb-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                    onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
            </div>
        @endforeach
    @endif
    <div class="flex justify-end max-md:flex-col max-md:items-end">
        <input wire:model.debounce.400ms="search"
            class="mb-[10px] h-[40px] w-[300px] rounded-[3px] border p-[5px] text-black outline-0 max-[420px]:w-full"
            type="search" placeholder="Meklēt...">
    </div>
    <div
        class="w-[1200px] shadow-md scrollbar-thin scrollbar-thumb-[#3c3e3a] max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90vw]">
        <table class="max-h-[60vh] w-full border-collapse shadow-md">
            <thead>
                <tr class="color-1 h-[40px] text-left text-white">
                    <th class="w-[5%] py-[12px] px-[15px]">ID</th>
                    <th class="w-[20%] py-[12px] px-[15px]">Vārds</th>
                    <th class="w-[20%] py-[12px] px-[15px]">Uzvārds</th>
                    <th class="w-[25%] py-[12px] px-[15px]">E-pasts</th>
                    <th class="w-[10%] py-[12px] px-[15px]">Objekti</th>
                    <th class="py-[12px] px-[15px]">Loma</th>
                    <th class="py-[12px] px-[15px]">Iestatījumi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="{{ $loop->iteration % 2 == 0 ? 'bg-[#F3F3F3]' : 'bg-white' }} h-[40px] border-b border-[#dddddd]">
                        <td class="w-[5%] py-[12px] px-[15px]">{{ $user->id }}</td>
                        <td class="w-[20%] py-[12px] px-[15px]">

                            @if ($user->id == $editIndex)
                                <input class="w-full rounded-[2px] border p-[5px] text-black outline-0" type="text"
                                    wire:model.defer="fname">
                            @else
                                {{ $user->fname }}
                            @endif

                        </td>
                        <td class="w-[20%] py-[12px] px-[15px]">

                            @if ($user->id == $editIndex)
                                <input class="w-full rounded-[2px] border p-[5px] text-black outline-0" type="text"
                                    wire:model.defer="lname">
                            @else
                                {{ $user->lname }}
                            @endif

                        </td>
                        <td class="w-[25%] py-[12px] px-[15px]">

                            @if ($user->id == $editIndex)
                                <input class="w-full rounded-[2px] border p-[5px] text-black outline-0" type="text"
                                    wire:model.defer="email">
                            @else
                                {{ $user->email }}
                            @endif

                        </td>

                        <td class="w-[10%] py-[12px] px-[15px]">
                            @if (count($user->objects) == 0)
                                Nav
                            @else
                                @foreach ($user->objects as $list)
                                    {{ $list->id }}{{ $loop->last ? '' : ',' }}
                                @endforeach
                            @endif
                        </td>

                        <td class="py-[12px] px-[15px]">
                            @if ($user->id == $editIndex)
                                @if ($user->id != Auth::user()->id)
                                    <select class="cursor-pointer rounded-[2px] border p-[5px] outline-0"
                                        wire:model.defer="role_id">
                                        <option value="1" {{ $user->role_id == '1' ? 'selected' : '' }}>
                                            Vadītājs
                                        </option>
                                        <option value="2" {{ $user->role_id == '2' ? 'selected' : '' }}>
                                            Brigadieris
                                        </option>
                                        <option value="3" {{ $user->role_id == '3' ? 'selected' : '' }}>
                                            Darbinieks
                                        </option>
                                    </select>
                                @else
                                    <div>
                                        {{ $user->role->name }}
                                    </div>
                                @endif
                            @else
                                <div>
                                    {{ $user->role->name }}
                                </div>
                            @endif
                        </td>
                        <td class="py-[12px] px-[15px]">
                            @if ($user->id != $editIndex)
                                @if ($user->id != Auth::user()->id)
                                    <i class="fa-regular fa-pen-to-square mr-[5px] cursor-pointer text-[20px]"
                                        wire:click="edit({{ $user->id }})"></i>
                                    <i wire:click="$emit('deleteUser',{{ $user->id }})"
                                        class="fa-regular fa-trash-can ml-[5px] cursor-pointer text-[20px]"></i>
                                @else
                                    <i class="fa-regular fa-pen-to-square mr-[5px] cursor-pointer text-[20px]"
                                        wire:click="edit({{ $user->id }})"></i>
                                @endif
                            @else
                                <button wire:click.prevent="save({{ $user->id }})"><i
                                        class="fa-solid fa-check mr-[5px] cursor-pointer text-[20px]"></i>
                                </button>
                                <button wire:click.prevent="cancel()">
                                    <i class="fa-solid fa-xmark ml-[5px] text-[20px]"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                    @if ($user->id == $editIndex)
                        <tr
                            class="{{ $loop->iteration % 2 == 0 ? 'bg-[#F3F3F3]' : 'bg-white' }} h-[40px] border-b border-[#dddddd]">
                            <td class="border-t" colspan="7">
                                <div class="px-[15px] pt-[12px]">
                                    <div class="flex w-1/4 flex-col">
                                        <label class="text-[15px]" for="personal_code">Personas kods</label>
                                        <input
                                            class="my-[5px] rounded-[3px] border border-solid p-[5px] text-[15px] text-black outline-0"
                                            wire:model.defer="personal_code" type="text" name="personal_code">
                                    </div>
                                    <div class="flex w-1/4 flex-col text-[15px]">
                                        <label class="pt-[10px]" for="date_of_birth">Dzimšanas datums</label>
                                        <input
                                            class="my-[5px] cursor-pointer rounded-[3px] border p-[5px] text-[15px] text-black outline-0"
                                            id="datepicker" wire:model.defer="date_of_birth" type="text"
                                            name="date_of_birth">
                                    </div>
                                    <div class="flex w-1/4 flex-col text-[15px]">
                                        <label class="pt-[10px]" for="city">Pilsēta</label>
                                        <input
                                            class="my-[5px] cursor-pointer rounded-[3px] border p-[5px] text-[15px] text-black outline-0"
                                            wire:model.defer="city" type="text" name="city">
                                    </div>
                                    <div class="flex w-1/4 flex-col text-[15px]">
                                        <label class="pt-[10px]" for="street">Iela</label>
                                        <input
                                            class="my-[5px] cursor-pointer rounded-[3px] border p-[5px] text-[15px] text-black outline-0"
                                            wire:model.defer="street" type="text" name="street">
                                    </div>
                                    <div class="flex w-1/4 flex-col text-[15px]">
                                        <label class="pt-[10px]" for="house_number">Mājas numurs</label>
                                        <input
                                            class="mt-[5px] cursor-pointer rounded-[3px] border p-[5px] text-[15px] text-black outline-0"
                                            wire:model.defer="house_number" type="text" name="house_number">
                                    </div>
                                </div>
                                <div class="py-[12px] px-[15px]">
                                    <h3 class="mb-[5px]">Izvēlieties darba objektus darbiniekam
                                        {{ $user->fname }}
                                        {{ $user->lname }}</h3>
                                    <div class="flex flex-col">
                                        @foreach ($objects as $object)
                                            <div>
                                                <input class="cursor-pointer" wire:model.defer="object_to_user"
                                                    type="checkbox" name="objects" value="{{ $object->id }}">
                                                <label>{{ $object->id }}. {{ $object->title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="7" class="bg-white py-[12px] px-[15px]">Kopā: {{ $userssum }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    <script>
        flatpickr("#datepicker", {
            'locale': 'lv',
            'dateFormat': "d/m/Y",
            'maxDate': new Date().fp_incr(-6574),
            'disableMobile': 'true'
        });
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('deleteUser', id => {
                Swal.fire({
                    title: 'Dzēst lietotāju?',
                    html: "Visi lietotāja dati tiks dzēsti!",
                    icon: 'warning',
                    confirmButtonText: 'Dzēst',
                    confirmButtonColor: '#2b6777',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Atcelt',
                }).then((result) => {
                    if (result.value) {
                        @this.call('remove', id)
                    }
                });
            });
        })
    </script>
</div>
