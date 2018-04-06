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
        <h2>Tasks</h2>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Active tasks</h4>
                </div>
                <div class="panel-body">
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

                                    @if(!empty($task->assignedTo) && (Auth::user()->name == $task->assignedTo->name))
                                        <td><b>{{$task->assignedTo->name}}</b></td>
                                    @else
                                        <td>{{$task->assignedTo ? $task->assignedTo->name : 'not assigned'}}</td>
                                    @endif

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
            </div>
        </div>
    </div>



    <div class="row completed-tasks">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Completed tasks</h4>
                </div>
                <div class="panel-body">
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
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>New task</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminTaskController@store']) !!}
                    <div class="form-group col-md-2">
                        {!! Form::label('Titel', 'Title:') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('Task', 'Task:') !!}
                        {!! Form::text('task', null, ['class'=>'form-control', 'rows'=>3]) !!}
                    </div>

                    <div class="form-group col-md-2">
                        {!! Form::label('event_id', 'Event:') !!}
                        {!! Form::select('event_id', array(''=>'Select Event') + $events, null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-2">
                        {!! Form::label('assigned_user_id', 'Assign to user:') !!}
                        {!! Form::select('assigned_user_id', array(''=>'Select User') + $users, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        <div class="pull-right">
                            {!! Form::submit('Create task', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@stop