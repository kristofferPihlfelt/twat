@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_task'))
        <p class="bg-danger">{{session('deleted_task')}}</p>
    @endif

    @if(Session::has('updated_task'))
        <p class="bg-info">{{session('completed_task')}}</p>
    @endif

    @if(Session::has('created_task'))
        <p class="bg-info">{{session('created_task')}}</p>
    @endif

    <div class="row">
        <h1>Tasks</h1>
        <table class="table table-hover table-condensed">
            <thead>
            <tr>
                <th>Title</th>
                <th>Task</th>
                <th>Assigned to</th>
                <th>Event</th>
                <th>Created</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>

                @foreach($tasks as $task)
                    @if($task->is_completed < 1)
                    <tr>
                        <td>{{$task->title}}</td>
                        <td>{{$task->task}}</td>
                        <td>{{$task->assignedTo ? $task->assignedTo->name : 'not assigned'}}</td>
                        <td>{{$task->event? $task->event->title : 'no campaign'}}</td>
                        <td>{{$task->created_at->diffForHumans()}}</td>
                        <td>
                            <div class="row">
                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminTaskController@update', $task->id]]) !!}
                            <input type="hidden" name="is_completed" value="1">
                            <div class="col-md-6 form-group">
                                {!! Form::button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  !!}
                            </div>
                            {!! Form::close() !!}

                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminTaskController@destroy', $task->id]]) !!}
                            <div class="col-md-6 form-group">
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  !!}
                            </div>
                            {!! Form::close() !!}
                            </div>
                        </td>

                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="row completed-tasks">
        <h2>Completed tasks</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Task</th>
                <th>Created by</th>
                <th>Assigned to</th>
                <th>Event</th>
                <th>Created</th>
                <th>Completed</th>
                <th>Change status</th>
            </tr>
            </thead>

            <tbody>
            @if($tasks)
                @foreach($tasks as $task)
                    @if($task->is_completed > 0)
                        <tr>
                            <td><del>{{$task->title}}</del></td>
                            <td><del>{{$task->task}}</del></td>
                            <td><del>{{$task->user->name}}</del></td>
                            <td><del>{{$task->assignedTo ? $task->assignedTo->name : 'not assigned'}}</del></td>
                            <td><del>{{$task->event? $task->event->title : 'no campaign'}}</del></td>
                            <td><del>{{$task->created_at->diffForHumans()}}</del></td>
                            <td>{{$task->is_completed > 0 ? $task->updated_at->diffForHumans() : 'Not completed'}}</td>
                            <td>
                                {!! Form::open(['method'=>'PATCH', 'action'=>['AdminTaskController@update', $task->id]]) !!}
                                <input type="hidden" name="is_completed" value="0">
                                <div class="form-group">
                                    {!! Form::button('<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  !!}
                                </div>
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endif
                @endforeach
            @endif

            </tbody>
        </table>
    </div>

    <div class="row">
        <h2>New task</h2>
        <div class="col-sm-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminTaskController@store']) !!}
            <div class="form-group">
                {!! Form::label('Titel', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Task', 'Task:') !!}
                {!! Form::textarea('task', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('event_id', 'Event:') !!}
                {!! Form::select('event_id', array(''=>'Select Event') + $events, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('assigned_user_id', 'Assign to user:') !!}
                {!! Form::select('assigned_user_id', array(''=>'Select User') + $users, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create task', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop