@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@stop

@section('content')


    <div class="row">
        <h2>Events</h2>
    </div>
    <div class="row">
        <div class="msg col-sm-12 col-md-6">

        </div>
    </div>
    <div class="row">


        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Kalender</div>

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Events</div>
                <div class="panel-body">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <td>Event</td>
                                <td>Description</td>
                                <td>Type</td>
                                <td>Channel</td>
                                <td>Start</td>
                                <td>End</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $event)
                                <tr class="product-list">
                                    <td>{{$event->title}}</td>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->category ? $event->category->name : 'No type for this event'}}</td>
                                    <td>{{$event->channel ? $event->channel->name : 'No channel for this event'}}</td>
                                    <td>{{$event->start_date}}</td>
                                    <td>{{$event->end_date}}</td>
                                    <td><a href="{{route('events.edit', $event->id)}}"><button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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