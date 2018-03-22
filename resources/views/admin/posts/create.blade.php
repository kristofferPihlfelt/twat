@extends('layouts.admin')

@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endsection

@section('content')


    <h1>Create post</h1>

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
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
    @endsection