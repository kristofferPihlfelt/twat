@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@stop


@section('content')

    <div class="row">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
        <div class='col-md-6'>
            <h2>Events</h2>
        </div>
        <div class="col-md-6">
            <h2>Tasks</h2>
        </div>

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

        <div class="col-sm-12 col-md-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Task</th>
                    <th>Event</th>
                    <th>Assigned to</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>

                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->title}}</td>
                        <td>{{$task->task}}</td>
                        <td>{{$task->event ? $task->event->title : 'no event'}}</td>
                        <td>{{$task->assignedTo ? $task->assignedTo->name : 'not assigned'}}</td>
                        <td>
                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminTaskController@update', $task->id]]) !!}
                            <input type="hidden" name="is_completed" value="1">
                            <div class="form-group">
                                {!! Form::button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  !!}
                            </div>
                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}

@stop


