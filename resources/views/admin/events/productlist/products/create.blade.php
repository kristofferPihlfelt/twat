@extends('layouts.admin')

@section('content')

    <div class="row">
        <h2>New product list</h2>
        <div class="col-sm-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminEventProductListController@store']) !!}

            <div class="form-group">
                {!! Form::label('event_id', 'Event:') !!}
                {!! Form::select('event_id', array(''=>'Select Event') + $events, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('supplier', 'Supplier:') !!}
                {!! Form::text('supplier', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('supplier_ref', 'Supplier reference:') !!}
                {!! Form::text('supplier_ref', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('product_ref', 'Product reference:') !!}
                {!! Form::text('product_ref', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('color', 'Color:') !!}
                {!! Form::text('color', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('quantity', 'Quantity:') !!}
                {!! Form::text('quantity', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('wholesale_price', 'Wholesale price:') !!}
                {!! Form::text('wholesale_price', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price_inc_tax', 'Price:') !!}
                {!! Form::text('price_inc_tax', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('regular_price_inc_tax', 'Regular price:') !!}
                {!! Form::text('regular_price_inc_tax', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('in_store', 'In store:') !!}
                {!! Form::text('in_store', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Create list', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')

@stop

