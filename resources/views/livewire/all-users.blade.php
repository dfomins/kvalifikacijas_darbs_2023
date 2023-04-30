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
            class="mb-[10px] h-[40px] w-[300px] rounded-[3px] border border-black p-[5px] text-black outline-0 max-[420px]:w-full"
            type="search" placeholder="Meklēt...">
    </div>
    <div
        class="w-[1200px] shadow-md scrollbar-thin scrollbar-thumb-[#3c3e3a] max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90vw]">
        <div>
            <table class="color-3 w-[1200px] table-fixed text-white">
                <thead>
                    <tr class="h-[40px]">
                        <th rowspan="2" class="w-[5%] border-r">ID</th>
                        <th rowspan="2" class="w-[20%] border-r">Vārds</th>
                        <th rowspan="2" class="w-[20%] border-r">Uzvārds</th>
                        <th rowspan="2" class="w-[25%] border-r">E-pasts</th>
                        <th rowspan="2" class="w-[10%] border-r">Objekti</th>
                        <th class="border-r border-b">Loma</th>
                        <th rowspan="2">Iestatījumi</th>
                    </tr>
                    <tr class="h-[40px]">
                        <th class="border-r">
                            <select
                                class="option-cursor-pointer cursor-pointer rounded-[3px] p-[2px] font-normal text-black outline-0">
                                <option value="0" selected>Bez filtra</option>
                                <option value="1">Vadītājs</option>
                                <option value="2">Brigadieris</option>
                                <option value="3">Darbinieks</option>
                            </select>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="max-h-[60vh]">
            <table class="w-[1200px] table-fixed text-white">
                <tbody>
                    @foreach ($users as $user)
                        <tr class="color-1 h-[50px]">
                            <td class="w-[5%] border-t text-center">{{ $user->id }}</td>
                            <td class="w-[20%] border-t px-[10px]">

                                @if ($user->id == $editIndex)
                                    <input class="w-full rounded-[2px] p-[5px] text-black outline-0" type="text"
                                        wire:model.defer="fname">
                                @else
                                    {{ $user->fname }}
                                @endif

                            </td>
                            <td class="w-[20%] border-t px-[10px]">

                                @if ($user->id == $editIndex)
                                    <input class="w-full rounded-[2px] p-[5px] text-black outline-0" type="text"
                                        wire:model.defer="lname">
                                @else
                                    {{ $user->lname }}
                                @endif

                            </td>
                            <td class="w-[25%] border-t px-[10px]">

                                @if ($user->id == $editIndex)
                                    <input class="w-full rounded-[2px] p-[5px] text-black outline-0" type="text"
                                        wire:model.defer="email">
                                @else
                                    {{ $user->email }}
                                @endif

                            </td>

                            <td class="w-[10%] border-t px-[10px]">
                                @if (count($user->objects) == 0)
                                    Nav
                                @else
                                    @foreach ($user->objects as $list)
                                        {{ $list->id }}{{ $loop->last ? '' : ',' }}
                                    @endforeach
                                @endif
                            </td>

                            <td class="border-t text-center text-black">
                                @if ($user->id == $editIndex)
                                    @if ($user->id != Auth::user()->id)
                                        <select class="cursor-pointer rounded-[2px] p-[5px] outline-0"
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
                                        <div class="text-white">
                                            {{ $user->role->name }}
                                        </div>
                                    @endif
                                @else
                                    <div class="text-white">
                                        {{ $user->role->name }}
                                    </div>
                                @endif
                            </td>
                            <td class="border-t text-center">
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
                            <tr class="color-1">
                                <td class="border-t" colspan="7">
                                    <div class="p-[10px] text-white">
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
                </tbody>
            </table>
        </div>
    </div>
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
