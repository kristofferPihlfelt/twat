@extends('layouts.admin')

@section('content')

    @if(Session::has('created_event'))
        <p class="bg-info">{{session('created_event')}}</p>
    @endif



    <div class="row">
        <h2>Event details</h2>
        <div class="col-md-5 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update event</h4>
                </div>
                    <div class="panel-body">
                    {!! Form::model($event,['method'=>'PATCH', 'action'=>['AdminEventController@update', $event->id ]] ) !!}
                    <div class="form-group">
                        {!! Form::label('Titel', 'Title:') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('event_category_id', 'Campaign type:') !!}
                        {!! Form::select('event_category_id', $categories, null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('event_channel_id', 'Channel:') !!}
                        {!! Form::select('event_channel_id', $channels, null, ['class'=>'form-control']) !!}
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
                        {!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-3']) !!}
                    </div>
                    {!! Form::close() !!}


                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminEventController@destroy', $event->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-3', 'style' => 'margin-left:1rem;']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="col-md-7 col-sm-12">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <h4>Product lists</h4>
                    </div>
                    <div class="panel-body">
                    @if($productlists)
                        @foreach($productlists as $productlist)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Info</th>
                                        <th>Edit</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$productlist->id ? $productlist->id : 'no productlist yet'}}</td>
                                        <td>{{$productlist->name ? $productlist->name : 'no productlist yet'}}</td>
                                        <td></td>
                                        <td><a href="{{route('productlist.edit', $productlist->id)}}"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></button></a></td>
                                        <td><a href="{{route('productlist.show', $productlist->id)}}"><button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    @endif
                    @if($productlists->isEmpty())
                        <div class="row">
                            <p>No product list attached to event yet</p>
                            <div class="col-md-12">
                                <a href="{{route('productlist.create')}}"><button class="btn btn-success btn-sm">Create product list</button></a>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Tasks</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr class="product-list">
                                <th>Title</th>
                                <th>Task</th>
                                <th>Assigned to</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($tasks)
                                @foreach($tasks as $task)
                                    @if($task->is_completed == 0)
                                    <tr class="product-list">
                                        <td>{{$task->title}}</td>
                                        <td>{{$task->task}}</td>
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
                                    @endif
                                    @if($task->is_completed == 1)
                                        <tr class="product-list">
                                            <td><s>{{$task->title}}</s></td>
                                            <td><s>{{$task->task}}</s></td>
                                            <td><s>{{$task->assignedTo ? $task->assignedTo->name : 'not assigned'}}</s></td>
                                            <td>
                                                {!! Form::open(['method'=>'PATCH', 'action'=>['AdminTaskController@update', $task->id]]) !!}
                                                <input type="hidden" name="is_completed" value="0">
                                                <div class="form-group">
                                                    {!! Form::button('<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div>
                            {!! Form::open(['method'=>'POST', 'action'=>'AdminTaskController@store']) !!}
                            <div class="form-group col-md-3">
                                {!! Form::label('Titel', 'Title:') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Task', 'Task:') !!}
                                {!! Form::text('task', null, ['class'=>'form-control', 'rows'=>3]) !!}
                            </div>

                            <div class="form-group col-md-3">
                                {!! Form::label('assigned_user_id', 'Assign to user:') !!}
                                {!! Form::select('assigned_user_id', array(''=>'Select User') + $users, null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                <div class="pull-right">
                                    <input type="hidden" name="event_id" value="{{$event->id}}">
                                    {!! Form::submit('Create task', ['class'=>'btn btn-primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
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

