<div>
    <div class="mb-[10px]">
        <input class="h-[40px] w-[200px] cursor-pointer rounded-[3px] border p-[5px] shadow-sm outline-0" type="text"
            readonly id="datepicker" wire:model="start_date"> -
        <input class="mr-[10px] h-[40px] w-[200px] cursor-pointer rounded-[3px] border p-[5px] shadow-sm outline-0"
            type="text" readonly id="datepicker" wire:model="end_date">
        <select class="border-grey mr-[10px] h-[40px] cursor-pointer rounded-[3px] border px-[5px] shadow-sm outline-0"
            wire:model="user_filter">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->id }}. {{ $user->fname }} {{ $user->lname }}
                </option>
            @endforeach
        </select>
        <button class="h-[40px] rounded-[3px] border bg-white px-[20px] shadow-sm"><i class="fa-solid fa-file-pdf"></i>
            PDF</button>
    </div>
    <div>
        <table class="w-full border-collapse shadow-md">

            <thead>
                <tr class="color-3 h-[40px] text-left text-white">
                    <th class="py-[12px] px-[15px]">Datums</th>
                    <th class="py-[12px] px-[15px]">Stundas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($work->sortBy("DATE_FORMAT('d-m-Y',date), ASC") as $list)
                    <tr
                        class="{{ $loop->iteration % 2 == 0 ? 'bg-[#F3F3F3] ' : 'bg-white ' }}{{ $loop->last ? 'border-b-2 border-solid border-[#009879]' : '' }} h-[40px] border-b border-[#dddddd]">
                        <td class="py-[12px] px-[15px]">
                            {{ Carbon\Carbon::createFromFormat('d/m/Y', $list->date)->translatedFormat('j. F (Y)') }}
                        </td>
                        <td class="py-[12px] px-[15px]">{{ $list->hours }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tr class="h-[40px] bg-white">
                <td class="py-[12px] px-[15px] text-left font-semibold">
                    {{ Carbon\Carbon::createFromFormat('d/m/Y', $this->start_date)->translatedFormat('j. F') }} -
                    {{ Carbon\Carbon::createFromFormat('d/m/Y', $this->end_date)->translatedFormat('j. F') }}<br>
                    Darbinieks:
                    {{ $this->user->fname }} {{ $this->user->lname }}</td>
                <td class="py-[12px] px-[15px] text-right font-semibold">Stundas kopā:
                    {{ $worksum }}</td>
            </tr>
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
