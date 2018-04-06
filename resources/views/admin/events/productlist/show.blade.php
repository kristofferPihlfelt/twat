@extends('layouts.admin')

@section('content')

    @if(Session::has('updated_list'))
        <p class="bg-success">{{session('updated_list')}}</p>
    @endif
    @if(Session::has('added_product'))
        <p class="bg-success">{{session('added_product')}}</p>
    @endif

    <div class="row">

        <h3>Product list: <b>{{$productList->name}}</b> for event: <b>{{$productList->event->title}}</b></h3>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Products</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-condensed table-striped">
                        <thead>
                        <tr class="product-list">
                            <th>Product name</th>
                            <th>Product art.</th>
                            <th>Supplier</th>
                            <th>Supplier art.</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Net price</th>
                            <th>Price</th>
                            <th>Ord. price</th>
                            <th>In store</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr class="product-list">
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_ref}}</td>
                                    <td>{{$product->supplier}}</td>
                                    <td>{{$product->supplier_ref}}</td>
                                    <td>{{$product->color}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->wholesale_price}}</td>
                                    <td>{{$product->price_inc_tax}}</td>
                                    <td>{{$product->regular_price_inc_tax}}</td>
                                    <td>{{$product->is_active}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Add product</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminEventProductListController@storeProduct'] ) !!}

                    <div class="form-group col-md-3 product-list">
                        {!! Form::label('product_name', 'Product name:') !!}
                        {!! Form::text('product_name', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('product_ref', 'Product art:') !!}
                        {!! Form::text('product_ref', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-3 product-list">
                        {!! Form::label('supplier', 'Supplier:') !!}
                        {!! Form::text('supplier', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('supplier_ref', 'Supplier art:') !!}
                        {!! Form::text('supplier_ref', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('color', 'Color:') !!}
                        {!! Form::text('color', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('quantity', 'Qty:') !!}
                        {!! Form::text('quantity', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('wholesale_price', 'Net price:') !!}
                        {!! Form::text('wholesale_price', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('price_inc_tax', 'Price:') !!}
                        {!! Form::text('price_inc_tax', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('regular_price_inc_tax', 'Ord. price:') !!}
                        {!! Form::text('regular_price_inc_tax', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-2 product-list">
                        {!! Form::label('is_active', 'In store:') !!}
                        {!! Form::text('is_active', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::hidden('list_id', $id, array('id' => 'list_id')) }}
                        {!! Form::submit('Add product', ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')

@stop

