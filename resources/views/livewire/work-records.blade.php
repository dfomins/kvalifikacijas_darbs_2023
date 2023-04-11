<div>
    <input class="mb-[10px] h-[40px] w-[200px] border p-[5px]" wire:model="date"
        {{ $editIndex != null ? 'disabled' : '' }} name="setTodaysDate" type="date">
    {{-- <input type="text" id="datepicker"> --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="mb-[10px] rounded-[3px] bg-red-600 p-[10px] text-white" data-closable>
                <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }} <button
                    onclick="this.parentNode.remove(); return false;" class="float-right">&times</button>
            </div>
        @endforeach
    @endif
    <div class="max-h-[60vh] shadow-md scrollbar-thin scrollbar-thumb-[#3c3e3a]">
        <table class="mx-auto w-[1200px] table-fixed text-white max-xl:w-[900px] max-lg:w-[700px] max-md:w-[580px]">
            <tr class="color-3 h-[40px]">
                <th class="w-[5%] border-r">ID</th>
                <th class="w-[30%] border-r">Vārds</th>
                <th class="w-[30%] border-r">Uzvārds</th>
                <th class="w-[15%] border-r">Stundas</th>
                <th class="w-[20%]">Iestatījumi</th>
            </tr>
            @foreach ($users as $user)
                <tr class="color-1 h-[40px] border-t">
                    <td class="text-center">{{ $user->id }}</td>
                    <td class="px-[10px]">{{ $user->fname }}</td>
                    <td class="px-[10px]">{{ $user->lname }}</td>
                    @if ($editIndex == $user->id)
                        <td class="text-center"><input class="w-full rounded-[2px] p-[3px] text-black outline-0"
                                wire:model.defer="hours" type="text">
                        </td>
                    @else
                        <td class="px-[10px] text-center">{{ $user->hours }}</td>
                    @endif
                    @if ($editIndex == $user->id)
                        <td class="text-center">
                            <button wire:click.prevent="save({{ $user }})"><i
                                    class="fa-solid fa-check mr-[5px] cursor-pointer text-[20px]"></i>
                            </button>
                            <button wire:click.prevent="cancel()">
                                <i class="fa-solid fa-xmark ml-[5px] text-[20px]"></i>
                            </button>
                        </td>
                    @else
                        <td class="text-center"><i
                                class="fa-regular fa-pen-to-square mr-[5px] cursor-pointer text-[20px]"
                                wire:click="edit({{ $user }})"></i></td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.onload = function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("setTodaysDate")[0].setAttribute('max', today);
        }
    </script>
</div>
