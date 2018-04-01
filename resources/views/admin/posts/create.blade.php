@extends('layouts.admin')

@section('styles')

@endsection

@section('content')

    <h2>Create post</h2>

    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group" id="editor">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('photo_id', 'Photo cover:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', array(''=>'Select Categories') + $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('meta_title', 'Meta title:') !!}
                {!! Form::text('meta_title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('meta_desc', 'Meta description:') !!}
                {!! Form::textarea('meta_desc', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>


    <div class="row">
        @include('includes.form-error')
    </div>

@stop

@section('scripts')

@endsection