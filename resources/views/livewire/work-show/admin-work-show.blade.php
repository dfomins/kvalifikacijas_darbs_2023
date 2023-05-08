<div>
    <div class="mb-[10px]">
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
    <div>
        <table class="w-full shadow-sm">
            <tbody>
                <tr class="h-[40px]">
                    <th colspan="4">
                        {{ Carbon\Carbon::createFromFormat('d/m/Y', $this->start_date)->translatedFormat('j. F') }} -
                        {{ Carbon\Carbon::createFromFormat('d/m/Y', $this->end_date)->translatedFormat('j. F') }}<br>
                        Darbinieks:
                        {{ $this->user->fname }} {{ $this->user->lname }}
                    </th>
                </tr>
                <tr class="color-3 h-[40px] text-white">
                    <th class="border-r">Datums</th>
                    <th class="border-r">Mēnesis</th>
                    <th class="border-r">Gads</th>
                    <th>Stundas</th>
                </tr>
                @foreach ($work->sortBy("DATE_FORMAT('d-m-Y',date), ASC") as $list)
                    <tr class="color-1 h-[40px] text-white">
                        <td class="text-center">
                            {{ Carbon\Carbon::createFromFormat('d/m/Y', $list->date)->translatedFormat('j') }}</td>
                        <td class="text-center">
                            {{ Carbon\Carbon::createFromFormat('d/m/Y', $list->date)->translatedFormat('F') }}
                        </td>
                        <td class="text-center">
                            {{ Carbon\Carbon::createFromFormat('d/m/Y', $list->date)->translatedFormat('Y') }}
                        </td>
                        <td class="text-center">{{ $list->hours }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
