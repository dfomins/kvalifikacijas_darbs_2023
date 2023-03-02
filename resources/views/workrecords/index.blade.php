@extends('layouts.app')

@section('content')
    <div class="work-window panel-standart">
        <div class="work-panel">
            {{ Form::label('date', 'Datums') }}
            <input type="text" id="datepicker" autocomplete="off">
            <table>
                @if (count($works) > 0)
                    <tr>
                        <th>Vārds, uzvārds</th>
                        <th>Objekts</th>
                        <th>date</th>
                        <th>Stundu skaits</th>
                    </tr>
                    @foreach ($works as $work)
                        <tr>
                            <td>{{ $work->user->fname }} {{ $work->user->lname }}</td>
                            <td>{{ $work->object_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($work->work_date)->format('d/m/Y') }}</td>
                            <td>{{ $work->hours }}</td>
                        </tr>
                    @endforeach
                    {{-- @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->fname }} {{ $user->lname }}</td>
                    </tr>
                @endforeach --}}
                @else
                    <p style="text-align: center">Informācijas par objektiem nav</p>
                    </li>
                @endif
            </table>
            @if (Auth::user()->role == 1)
                <div class="create_note_btn">
                    <a href="/work/create"><button>Izveidot jaunu</button></a>
                </div>
            @endif
        </div>
    </div>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'dd/mm/yy'
            });
            $("#datepicker").datepicker("setDate", new Date());
        });
    </script>
@endsection
