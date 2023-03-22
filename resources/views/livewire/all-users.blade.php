<div>
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="mb-[15px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                        onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
                </div>
            @endforeach
        @endif

        <table
            class="w-[1200px] table-fixed text-white max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90%]">
            <thead>
                <tr class="color-3 h-[50px]">
                    <th class="w-[5%] border-r">ID</th>
                    <th class="w-[20%] border-r">Vārds</th>
                    <th class="w-[20%] border-r">Uzvārds</th>
                    <th class="w-[35%] border-r">E-pasts</th>
                    <th class="border-r">Loma</th>
                    <th>Iestatījumi</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="max-h-[60vh] overflow-x-auto scrollbar-thin scrollbar-thumb-[#3c3e3a]">
        <table
            class="w-[1200px] table-fixed text-white max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90%]">
            <tbody>
                @foreach ($users as $user)
                    <tr class="color-1 h-[50px]">
                        <td class="w-[5%] border-t text-center">{{ $user->id }}</td>
                        <td class="w-[20%] border-t px-[10px]">

                            @if ($user->id == $editIndex)
                                <input class="w-full px-[5px] text-black outline-0" type="text"
                                    wire:model.defer="fname">
                            @else
                                {{ $user->fname }}
                            @endif

                        </td>
                        <td class="w-[20%] border-t px-[10px]">

                            @if ($user->id == $editIndex)
                                <input class="w-full px-[5px] text-black outline-0" type="text"
                                    wire:model.defer="lname">
                            @else
                                {{ $user->lname }}
                            @endif

                        </td>
                        <td class="w-[35%] border-t px-[10px]">

                            @if ($user->id == $editIndex)
                                <input class="w-full px-[5px] text-black outline-0" type="text"
                                    wire:model.defer="email">
                            @else
                                {{ $user->email }}
                            @endif

                        </td>
                        <td class="border-t text-center text-black">
                            @if ($user->id == $editIndex)
                                @if ($user->id != Auth::user()->id)
                                    <select class="cursor-pointer outline-0"
                                        wire:change="changeRole({{ $user->id }}, $event.target.value)">
                                        <option value="1" {{ $user->role_id == '1' ? 'selected' : '' }}>Vadītājs
                                        </option>
                                        <option value="2" {{ $user->role_id == '2' ? 'selected' : '' }}>Brigadieris
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
