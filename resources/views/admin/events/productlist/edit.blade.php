@extends('layouts.admin')

@section('content')

    @if(Session::has('updated_list'))
        <p class="bg-success">{{session('updated_list')}}</p>
    @endif
    @if(Session::has('added_product'))
        <p class="bg-success">{{session('added_product')}}</p>
    @endif

    <div class="row">
        <h2>Edit list</h2>
        <div class="col-sm-12 col-md-4">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4>List settings</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($productList,['method'=>'PATCH', 'action'=>['AdminEventProductListController@update', $productList->id ]] ) !!}

                    <div class="form-group">
                        {!! Form::label('event_id', 'Event:') !!}
                        {!! Form::select('event_id', $events, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update', ['class'=>'btn btn-success btn-sm col-sm-3']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminEventProductListController@destroy', $productList->id ]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm col-sm-3', 'style' => 'margin-left:1rem;']) !!}
                        </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

@stop

