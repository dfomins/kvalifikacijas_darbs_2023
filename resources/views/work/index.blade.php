@extends('layouts.app')

@section('content')
    <div class="work-window">
        <div class="work-panel panel-standart">
            <div>
                <p>Šeit būs filtrs</p>
            </div>
            <table>
                <tr>
                    <th>Vārds, uzvārds</th>
                    <th>Objekts</th>
                    <th>Datums</th>
                    <th>Stundu skaits</th>
                </tr>
                @if (count($works) > 0)
                    @foreach ($works as $work)
                        <tr>
                            <td>{{ $work->user_id }}</td>
                            <td>{{ $work->object_id }}</td>
                            <td>{{ $work->date }}</td>
                            <td>{{ $work->hours }}</td>
                        </tr>
                    @endforeach
                @else
                    <p style="text-align: center">Informācijas par objektiem nav</p>
                    </li>
                @endif
            </table>
            @if (Auth::user()->role == 1)
                <a href="/work/create" id="btn"><input type="button" name="button" value="Izveidot jaunu"
                        id="btn" /></a>
            @endif
        </div>
    </div>
@endsection
