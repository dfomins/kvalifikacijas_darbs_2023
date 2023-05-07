<div>
    <div>
        <input class="h-[40px] w-[200px] cursor-pointer rounded-[3px] border p-[5px] shadow-sm outline-0" type="text"
            readonly id="datepicker" wire:model="start_date"> -
        <input class="mr-[10px] h-[40px] w-[200px] cursor-pointer rounded-[3px] border p-[5px] shadow-sm outline-0"
            type="text" readonly id="datepicker" wire:model="end_date">
        <select class="border-grey h-[40px] cursor-pointer rounded-[3px] border px-[5px] shadow-sm outline-0"
            wire:model="user_filter">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->id }}. {{ $user->fname }} {{ $user->lname }}
                </option>
            @endforeach
        </select>
    </div>
    <div>Stundu skaits par izvēlētiem datumiem {{ $this->start_date }} - {{ $this->end_date }}</div>
    <div>
        @foreach ($work as $list)
            {{-- {{ Carbon\Carbon::createFromFormat('d/m/Y', $list->date)->format('F') }}: --}}
            {{ $list->hours }}{{ $loop->last ? '' : ',' }}
        @endforeach
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/lv.js"></script>
    {{-- <script src="https://unpkg.com/flatpickr@4.6.13/dist/plugins/rangePlugin.js"></script> --}}
    <script>
        flatpickr("#datepicker", {
            'locale': 'lv',
            'dateFormat': "d/m/Y",
            'maxDate': 'today',
            // "plugins": [new rangePlugin({
            //     input: "#secondRangeInput"
            // })]
            'disableMobile': 'true'
        });
    </script>
</div>
