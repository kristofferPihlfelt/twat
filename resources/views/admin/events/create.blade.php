@extends('layouts.admin')

    @section('content')

        @if(Session::has('created_event'))
            <p class="bg-info">{{session('created_event')}}</p>
        @endif

        <div class="row">
            <h2>Add new event</h2>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Event details</h4>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['method'=>'POST', 'action'=>'AdminEventController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('Titel', 'Title:') !!}
                            {!! Form::text('title', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'Campaign type:') !!}
                            {!! Form::select('category_id', array(''=>'Select campaign type') + $categories, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('channel_id', 'Channel:') !!}
                            {!! Form::select('channel_id', array(''=>'Select Channel') + $channels, null, ['class'=>'form-control']) !!}
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
                            {!! Form::submit('Create task', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
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

