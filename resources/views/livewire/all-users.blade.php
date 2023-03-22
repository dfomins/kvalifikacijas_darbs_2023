<div>
    <div>
        <table
            class="w-[1200px] table-fixed text-white max-xl:w-[1000px] max-lg:w-[750px] max-md:w-[600px] max-sm:w-[90%]">
            <thead>
                <tr class="color-3 h-[50px]">
                    <th class="w-[5%]">ID</th>
                    <th class="w-[20%]">Vārds</th>
                    <th class="w-[20%]">Uzvārds</th>
                    <th class="w-[35%]">E-pasts</th>
                    <th>Loma</th>
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
                        <td class="w-[5%] border-r border-t text-center">{{ $user->id }}</td>
                        <td class="w-[20%] border-r border-t pl-[10px]">{{ $user->fname }}</td>
                        <td class="w-[20%] border-r border-t pl-[10px]">{{ $user->lname }}</td>
                        <td class="w-[35%] border-r border-t pl-[10px]">{{ $user->email }}</td>
                        <td class="border-r border-t pl-[10px]">{{ $user->role->name }}</td>
                        <td class="border-r border-t text-center">
                            @if ($user->id != Auth::user()->id)
                                <i class="fa-regular fa-pen-to-square mr-[5px] text-[20px]"></i>
                                <i class="fa-regular fa-trash-can ml-[5px] text-[20px]"></i>
                            @else
                                <i class="fa-regular fa-pen-to-square mr-[5px] text-[20px]"></i>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
