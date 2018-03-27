@extends('layouts.admin')

@section('content')

    <div class="row">
        <h2>New product list</h2>
        <div class="col-sm-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminEventProductListController@store']) !!}

            <div class="form-group">
                {!! Form::label('event_id', 'Event:') !!}
                {!! Form::select('event_id', array(''=>'Select Event') + $events, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create list', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')

@stop

