@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_category'))
        <p class="bg-danger">{{session('deleted_category')}}</p>
    @endif

    @if(Session::has('updated_category'))
        <p class="bg-danger">{{session('updated_category')}}</p>
    @endif

    @if(Session::has('created_category'))
        <p class="bg-danger">{{session('created_category')}}</p>
    @endif

    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Category:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">

        @if($categories)

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif


    </div>


@stop