<div>
    <input wire:model="date" id="date" type="date">
    {{ $this->date }}
    <table class="mx-auto">
        <tr>
            <th class="w-[25%]">Vārds</th>
            <th class="w-[25%]">Uzvārds</th>
            <th class="w-[40%]">Nostrādāto stundu daudzums</th>
            <th class="w-[10%]">Iestatījumi</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->fname }}</td>
                <td>{{ $user->lname }}</td>
                @if ($editIndex == $user->id)
                    <td><input wire:model.defer="hours" type="text"></td>
                @else
                    <td>{{ $user->hours }}</td>
                @endif
                @if ($editIndex == $user->id)
                    <td>
                        <button wire:click.prevent="save({{ $user }})"><i
                                class="fa-solid fa-check mr-[5px] cursor-pointer text-[20px]"></i>
                        </button>
                        <button wire:click.prevent="cancel()">
                            <i class="fa-solid fa-xmark ml-[5px] text-[20px]"></i>
                        </button>
                    </td>
                @else
                    <td><i class="fa-regular fa-pen-to-square mr-[5px] cursor-pointer text-[20px]"
                            wire:click="edit({{ $user }})"></i></td>
                @endif
            </tr>
        @endforeach
    </table>
</div>
