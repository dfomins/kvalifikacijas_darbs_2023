<div class="w-[1200px] overflow-y-auto max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90vw]">
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="mb-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                        onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                </div>
            @endforeach
        @endif

        <table class="color-3 w-[1200px] table-fixed text-white">
            <thead>
                <tr class="h-[50px]">
                    <th rowspan="2" class="w-[5%] border-r">ID</th>
                    <th class="w-[20%] border-r border-b">Vārds</th>
                    <th class="w-[20%] border-r border-b">Uzvārds</th>
                    <th class="w-[25%] border-r">E-pasts</th>
                    <th rowspan="2" class="w-[10%] border-r">Objekti</th>
                    <th class="border-r">Loma</th>
                    <th rowspan="2">Iestatījumi</th>
                </tr>
                <tr class="h-[40px]">
                    <th class="w-[20%] border-r"><input wire:model.debounce.400ms="fname_search"
                            class="h-[30px] w-[230px] rounded-[3px] p-[5px] font-normal text-black outline-0"
                            type="text" placeholder="Meklēt pēc vārda..."></th>
                    <th class="w-[20%] border-r"><input wire:model.debounce.400ms="lname_search"
                            class="h-[30px] w-[230px] rounded-[3px] p-[5px] font-normal text-black outline-0"
                            type="text" placeholder="Meklēt pēc uzvārda..."></th>
                    <th class="w-[20%] border-r"><input wire:model.debounce.400ms="lname_search"
                            class="h-[30px] w-[290px] rounded-[3px] p-[5px] font-normal text-black outline-0"
                            type="text" placeholder="Meklēt pēc e-pasta..."></th>
                    <th><select name="" id=""></select></th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="min-lg:overflow-y-auto min-lg:scrollbar-thin min-lg:scrollbar-thumb-[#3c3e3a] max-h-[60vh]">
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
                            @if ($user->id == $editIndex)
                                @if (count($user->objects) == 0)
                                    Nav
                                @else
                                    @foreach ($user->objects as $list)
                                        {{ $list->id }}{{ $loop->last ? '' : ',' }}
                                    @endforeach
                                @endif
                                <div class="absolute bottom-5 right-4 rounded-[2px] border border-black p-[10px]">
                                    <h3 class="mb-[5px] text-black">Izvēlieties objektus darbiniekam {{ $user->fname }}
                                        {{ $user->lname }}</h3>
                                    <div class="flex flex-col text-black">
                                        @foreach ($objects as $object)
                                            <div>
                                                <input class="cursor-pointer" wire:model.defer="object_to_user"
                                                    type="checkbox" name="objects" value="{{ $object->id }}">
                                                <label>{{ $object->id }}. {{ $object->title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                @if (count($user->objects) == 0)
                                    Nav
                                @else
                                    @foreach ($user->objects as $list)
                                        {{ $list->id }}{{ $loop->last ? '' : ',' }}
                                    @endforeach
                                @endif
                            @endif
                        </td>

                        <td class="border-t text-center text-black">
                            @if ($user->id == $editIndex)
                                @if ($user->id != Auth::user()->id)
                                    <select class="cursor-pointer rounded-[2px] p-[5px] outline-0"
                                        wire:model.defer="role_id">
                                        <option value="1" {{ $user->role_id == '1' ? 'selected' : '' }}>Vadītājs
                                        </option>
                                        <option value="2" {{ $user->role_id == '2' ? 'selected' : '' }}>
                                            Brigadieris
                                        </option>
                                        <option value="3" {{ $user->role_id == '3' ? 'selected' : '' }}>Darbinieks
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
                                    <i class="fa-regular fa-trash-can ml-[5px] cursor-pointer text-[20px]"
                                        wire:click="remove({{ $user->id }})"></i>
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
