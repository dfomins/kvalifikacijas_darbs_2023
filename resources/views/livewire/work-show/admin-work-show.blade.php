<div>
    <div class="mb-[10px] flex max-lg:flex-col">
        <div class="mb-[5px] flex items-center max-[463px]:flex-col">
            <input
                class="h-[40px] w-[200px] cursor-pointer rounded-[3px] border p-[5px] outline-0 max-[463px]:w-full min-[463px]:mr-[5px]"
                type="text" readonly id="datepicker" wire:model="start_date"> -
            <input
                class="ml-[5px] h-[40px] w-[200px] cursor-pointer rounded-[3px] border p-[5px] outline-0 max-[463px]:w-full lg:mr-[10px]"
                type="text" readonly id="datepicker" wire:model="end_date">
        </div>
        <div class="flex max-[331px]:flex-col">
            <select
                class="border-grey mr-[10px] h-[40px] cursor-pointer rounded-[3px] border px-[5px] outline-0 max-[331px]:mb-[5px] max-[331px]:w-full"
                wire:model="user_filter">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }}. {{ $user->fname }} {{ $user->lname }}
                    </option>
                @endforeach
            </select>
            <button class="h-[40px] rounded-[3px] border bg-white px-[20px]" {{ count($work) < 1 ? 'disabled' : '' }}
                wire:click="export"><i class="fa-solid fa-cloud-arrow-down"></i>
                Excel
            </button>
        </div>
    </div>
    <div>
        <table class="w-full border-collapse shadow-md">
            <thead>
                <tr class="color-1 h-[40px] text-left text-white">
                    <th class="py-[12px] px-[15px]">Datums</th>
                    <th class="py-[12px] px-[15px]">Stundas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($work->sortBy("DATE_FORMAT('d-m-Y',date), ASC") as $list)
                    <tr
                        class="{{ $loop->iteration % 2 == 0 ? 'bg-[#F3F3F3] ' : 'bg-white ' }}{{ $loop->last ? 'border-b-2 border-solid border-[#2b6777]' : 'border-[#dddddd]' }} h-[40px] border-b">
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
                    {{ $this->user->fname }} {{ $this->user->lname }}<br>
                    Objekti:

                    @if (!$this->user->objects->isEmpty())
                        @foreach ($this->user->objects as $list)
                            {{ $list->id }}{{ $loop->last ? '' : ',' }}
                        @endforeach
                    @else
                        nav
                    @endif
                </td>
                <td class="py-[12px] px-[15px] text-right font-semibold">Stundas kopā:
                    {{ $worksum }}
                </td>
            </tr>
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
            'maxDate': 'today',
            'disableMobile': 'true'
        });
    </script>
</div>
