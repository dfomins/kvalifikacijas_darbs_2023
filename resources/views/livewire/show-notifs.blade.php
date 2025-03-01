<div class="mb-[20px]">
    <div class="flex justify-end max-md:flex-col max-md:items-end">
        @if (count($notifs) > 1)
            <div class="mb-[10px] flex items-center justify-end max-[420px]:w-full">
                <p class="mr-[10px] max-[420px]:hidden">Kārtot pēc:</p>
                <select
                    class="h-[40px] w-[200px] cursor-pointer appearance-none rounded-[3px] border bg-[url('https://www.svgrepo.com/show/80156/down-arrow.svg')] bg-[length:12px_12px] bg-[calc(100%-10px)] bg-no-repeat px-[5px] !text-[15px] outline-0 max-[420px]:w-full md:mr-[10px]"
                    wire:model="sort">
                    <option value="desc">Jaunākie</option>
                    <option value="asc">Vecākie</option>
                </select>
            </div>
        @endif
        <input wire:model.debounce.400ms="search"
            class="mb-[10px] h-[40px] w-[300px] rounded-[3px] border p-[5px] text-black outline-0 max-[420px]:w-full"
            type="search" placeholder="Meklēt pēc nosaukuma...">
    </div>
    <div class="mb-[20px] h-[60vh] overflow-y-auto text-white scrollbar-thin scrollbar-thumb-[#3c3e3a]">
        <ol>
            @if (count($notifs) > 0)
                @foreach ($notifs as $notif)
                    @if ($loop->last)
                        <a class="text-white" href="{{ route('notifications') }}/{{ $notif->id }}">
                            <li class="flex w-full bg-[#2b6777] p-[10px] duration-300 hover:bg-[#2b6777ef]">
                                <div>
                                    <h3>{{ $notif->title }}</h3>
                                    <p>Izveidots: {{ $notif->created_at->format('d-m-Y') }}</p>
                                </div>
                            </li>
                        </a>
                    @else
                        <a class="text-white" href="{{ route('notifications') }}/{{ $notif->id }}">
                            <li class="mb-[10px] flex w-full bg-[#2b6777] p-[10px] duration-300 hover:bg-[#2b6777ef]">
                                <div>
                                    <h3>{{ $notif->title }}</h3>
                                    <p>Izveidots: {{ $notif->created_at->format('d-m-Y') }}</p>
                                </div>
                            </li>
                        </a>
                    @endif
                @endforeach
            @else
                <p class="text-center text-black">Paziņojumu nav</p>
                </li>
            @endif

        </ol>
    </div>
    @if (auth()->user()->role_id === 1)
        <div class="flex justify-center">
            <a href="{{ route('notifications') }}/jauns"><button
                    class="group flex h-[50px] w-[50px] cursor-pointer items-center justify-center rounded-full bg-[#2b6777] text-white duration-300 hover:bg-[#52ab98]"><i
                        class="fa-solid fa-plus text-[20px] duration-300 group-hover:rotate-90"></i></button>
            </a>
        </div>
    @endif
</div>
