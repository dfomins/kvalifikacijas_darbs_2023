@extends('layouts.app')

@section('content')
    <div class="work-window">
        <div class="work-panel panel-standart">
            <div>
                <form action="{{ url('search') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="search">
                    <input type="submit" value="Meklēt">
                </form>
            </div>
            <table>
                @if (count($works) > 0)
                    <tr>
                        <th>Vārds, uzvārds</th>
                        <th>Objekts</th>
                        <th>Datums</th>
                        <th>Stundu skaits</th>
                    </tr>
                    @foreach ($works as $work)
                        <tr>
                            <td>{{ $work->user->fname }} {{ $work->user->lname }} (ID: {{ $work->user->id }})</td>
                            <td>{{ $work->object_id }}</td>
                            <td>{{ date('d/m/Y', strtotime($work->date)) }}</td>
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
