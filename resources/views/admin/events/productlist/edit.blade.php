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
        <div class="col-sm-2">
            <h4>Update list</h4>
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
                {!! Form::submit('Update list', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>


        <div class="col-sm-6">
            <h4>Add product</h4>

            {!! Form::open(['method'=>'POST', 'action'=>'AdminEventProductListController@storeProduct'] ) !!}

            <div class="form-group col-md-6">
                {!! Form::label('product_name', 'Product name:') !!}
                {!! Form::text('product_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('product_ref', 'Product reference:') !!}
                {!! Form::text('product_ref', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('supplier', 'Supplier:') !!}
                {!! Form::text('supplier', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('supplier_ref', 'Supplier reference:') !!}
                {!! Form::text('supplier_ref', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('color', 'Color:') !!}
                {!! Form::text('color', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('quantity', 'Quantity:') !!}
                {!! Form::text('quantity', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('wholesale_price', 'Wholesale price:') !!}
                {!! Form::text('wholesale_price', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('price_inc_tax', 'Price:') !!}
                {!! Form::text('price_inc_tax', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('regular_price_inc_tax', 'Regular price:') !!}
                {!! Form::text('regular_price_inc_tax', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-3">
                {!! Form::label('is_active', 'Active in store:') !!}
                {!! Form::text('is_active', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group pull-right">
                {{ Form::hidden('list_id', $productList->id, array('id' => 'list_id')) }}
                {!! Form::submit('Add product', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>

@stop

@section('scripts')

@stop

