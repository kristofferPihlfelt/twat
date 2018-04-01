@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_category'))
        <p class="bg-danger">{{session('deleted_category')}}</p>
    @endif
    @if(Session::has('deleted_channel'))
        <p class="bg-danger">{{session('deleted_channel')}}</p>
    @endif
    @if(Session::has('created_channel'))
        <p class="bg-success">{{session('created_channel')}}</p>
    @endif
    @if(Session::has('created_category'))
        <p class="bg-success">{{session('created_category')}}</p>
    @endif

    <div class="row">
        <h1>Event settings</h1>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Event categories</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            {!! Form::open(['route' => ['settings.delete.category', $category->id], 'method' => 'delete']) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 form.group">
                        {!! Form::open(['method'=>'POST', 'route'=>'settings.store.category']) !!}
                        <div class="col-sm-8">

                            {!! Form::text('category', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Event channels</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Channel</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($channels as $channel)
                            <tr>
                                <td>{{$channel->id}}</td>
                                <td>{{$channel->name}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            {!! Form::open(['route' => ['settings.delete.channel', $channel->id], 'method' => 'delete']) !!}
                                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-12 form.group">
                        {!! Form::open(['method'=>'POST', 'route'=>'settings.store.channel']) !!}
                        <div class="col-sm-8">

                            {!! Form::text('channel', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  !!}
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop