<div>
    <input wire:model="work_date" id="date" type="date">
    {{ $this->work_date }}
    <table class="mx-auto">
        <tr>
            <th class="w-[30%]">Vārds</th>
            <th class="w-[30%]">Uzvārds</th>
            <th class="w-[40%]">Nostrādāto stundu daudzums</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->fname }}</td>
                <td>{{ $user->lname }}</td>
                <td>{{ $user->work }}
                    {{-- @foreach ($user->work as $list)
                        @if ($editIndex == 1)
                            <input wire:model="hours" type="text">
                        @else
                            {{ $list->hours }}
                        @endif
                    @endforeach --}}
                </td>
            </tr>
        @endforeach
    </table>
    <button wire:click="edit">Rediģēt</button>
</div>
