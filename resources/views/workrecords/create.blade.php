@extends('layouts.app')

@section('content')
    <div class="create-post-window">
        <div class="create-post-panel">
            {!! Form::open(['action' => 'App\Http\Controllers\WorkrecordsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{ Form::label('user_id', 'Darbinieka vārds, uzvārds') }}
                {{ Form::select('user_id', $users, null, ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('object_id', 'Objekts') }}
                {{ Form::text('object_id', '', ['required', 'class' => 'form-control create-title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('work_date', 'Datums') }}
                {{ Form::text('work_date', null, ['required', 'id' => 'datepicker', 'autocomplete' => 'off']) }}
            </div>
            <div class="form-group">
                {{ Form::label('hours', 'Stundas') }}
                {{ Form::select('hours', [0, 1, 2, 3, 4, 5, 6, 7, 8], null, ['required', 'class' => 'form-control create-title']) }}
            </div>
            {{ Form::submit('Izveidot', ['class' => 'create-btn']) }}
            {!! Form::close() !!}
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
