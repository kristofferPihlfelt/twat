@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@stop

@section('content')


    <div class="row">
        <h1>Events</h1>
    </div>
    <div class="row">
        <div class="msg col-sm-12 col-md-6">
            @if(Session::has('deleted_event'))
                <p class="bg-danger">{{session('deleted_event')}}</p>
            @endif

            @if(Session::has('updated_event'))
                <p class="bg-success">{{session('updated_event')}}</p>
            @endif

            @if(Session::has('created_event'))
                <p class="bg-success">{{session('created_event')}}</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Kalender</div>

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}

@stop