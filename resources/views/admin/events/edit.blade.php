@extends('layouts.admin')

@section('content')

    @if(Session::has('created_event'))
        <p class="bg-info">{{session('created_event')}}</p>
    @endif

    <div class="row">
        <h2>Edit task</h2>
        <div class="col-sm-6">
            {!! Form::model($event,['method'=>'PATCH', 'action'=>['EventController@update', $event->id ]] ) !!}
            <div class="form-group">
                {!! Form::label('Titel', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('start_date', 'Start date:') !!}
                {!! Form::date('start_date', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('end_date', 'End date:') !!}
                {!! Form::date('end_date', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-2']) !!}
            </div>
            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=>['EventController@destroy', $event->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-2', 'style' => 'margin-left:1rem;']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "yy-mm-dd"
        });
    </script>

@stop

