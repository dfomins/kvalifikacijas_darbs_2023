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
                <tr>
                    <td>Ivans Duļins</td>
                    <td>4</td>
                    <td>28.02.12.</td>
                    <td>8</td>
                </tr>
            </table>
            @if (Auth::user()->role == 1)
                <a href="/work/create" id="btn"><input type="button" name="button" value="Izveidot jaunu"
                        id="btn" /></a>
            @endif
        </div>
    </div>
@endsection
