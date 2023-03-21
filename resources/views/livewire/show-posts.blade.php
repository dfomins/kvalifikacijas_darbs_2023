<div class="mb-[20px] w-[1200px] max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90%]">
    <div class="flex justify-end max-md:flex-col max-md:items-end max-[420px]:w-full">
        <div class="mb-[10px] flex items-center">
            <p class="mr-[10px]">Kārtot pēc:</p>
            <select
                class="h-[40px] w-[200px] cursor-pointer appearance-none rounded-[3px] border border-black bg-[url('https://www.svgrepo.com/show/80156/down-arrow.svg')] bg-[length:12px_12px] bg-[calc(100%-10px)] bg-no-repeat !text-[15px] outline-0 md:mr-[10px]"
                wire:model="sort">
                <option value="desc">Jaunākās</option>
                <option value="asc">Vecākās</option>
            </select>
        </div>
        <input wire:model.debounce.400ms="search"
            class="mb-[10px] h-[40px] w-[300px] rounded-[3px] border border-black p-[5px] text-black outline-0 max-[420px]:w-full"
            type="search" placeholder="Meklēt pēc nosaukuma...">
    </div>
    <div class="h-[60vh] !overflow-y-auto text-white scrollbar-thin scrollbar-thumb-[#3c3e3a]">
        <ol>
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    @if ($loop->last)
                        <a class="text-white" href="{{ route('posts') }}/{{ $post->id }}">
                            <li class="flex w-full bg-[#2b6777] p-[10px] duration-300 hover:bg-[#2b6777ef]">
                                <div>
                                    <h3>{{ $post->title }}</h3>
                                    <p>Izveidota: {{ $post->created_at->format('d-m-Y') }}</p>
                                </div>
                            </li>
                        </a>
                    @else
                        <a class="text-white" href="{{ route('posts') }}/{{ $post->id }}">
                            <li class="mb-[10px] flex w-full bg-[#2b6777] p-[10px] duration-300 hover:bg-[#2b6777ef]">
                                <div>
                                    <h3>{{ $post->title }}</h3>
                                    <p>Izveidota: {{ $post->created_at->format('d-m-Y') }}</p>
                                </div>
                            </li>
                        </a>
                    @endif
                @endforeach
            @else
                <p class="text-center text-black">Piezīmju nav</p>
            @endif
        </ol>
    </div>
</div>
