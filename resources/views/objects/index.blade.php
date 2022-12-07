@extends('layouts.app')

@section('content')
    <div class="note-window">
        <div class="note-panel panel-standart">
            <div class="title">
                <h2>Informācija par objektiem</h2>
            </div>
            <div class="threads">
                <ol>
                    @if (count($objects) > 0)
                        @foreach ($objects as $object)
                            <li class="row">
                                <div class="title-text-post">
                                    <h3><a href="/objects/{{ $object->id }}">{{ $object->id }} | {{ $object->title }}</a>
                                    </h3>
                                </div>
                        @endforeach
                    @else
                        <p style="text-align: center">Informācijas par objektiem nav</p>
                        </li>
                    @endif
                </ol>
            </div>
            @if (Auth::user()->role == 1)
                {
                <a href="/objects/create" id="btn"><input type="button" name="button" value="Izveidot jaunu"
                        id="btn" /></a>
                }
            @endif
        </div>
    </div>
@endsection
