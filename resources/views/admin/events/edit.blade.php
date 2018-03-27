@extends('layouts.admin')

@section('content')

    @if(Session::has('created_event'))
        <p class="bg-info">{{session('created_event')}}</p>
    @endif

    <div class="row">

        <div class="col-md-6 col-sm-12">
            <h2>Edit event</h2>
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
                {!! Form::label('category_id', 'Campaign type:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('channel_id', 'Channel:') !!}
                {!! Form::select('channel_id', $channels, null, ['class'=>'form-control']) !!}
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


            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminEventController@destroy', $event->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-2', 'style' => 'margin-left:1rem;']) !!}
            </div>
            {!! Form::close() !!}
        </div>


        <div class="col-md-6 col-sm-12">
            <h2>Product lists</h2>

            @if($productlists)
                @foreach($productlists as $productlist)
                <div class="row">
                    <h4>Active list</h4>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$productlist->id ? $productlist->id : 'no productlist yet'}}</td>
                                <td>{{$productlist->name ? $productlist->name : 'no productlist yet'}}</td>
                                <td><a href="{{route('productlist.edit', $productlist->id)}}">Edit list</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            @endif
            @if($productlists->isEmpty())
            <div class="row">
                <h4>Add product list</h4>
                <div class="col-md-12">

                </div>

            </div>
            @endif

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

