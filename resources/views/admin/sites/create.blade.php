@extends('layouts.admin')

@section('content')

    @if(Session::has('added_site'))
        <p class="bg-info">{{session('added_site')}}</p>
    @endif
    <div class="row">
        <h2>Add new site</h2>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Site details</h4>
                </div>
                <div class="panel-body">

                    {!! Form::open(['method'=>'POST', 'action'=>'AdminSiteController@store']) !!}
                    <div class="form-group">
                        {!! Form::label('url', 'Url:') !!}
                        {!! Form::url('url', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('platform', 'Platform:') !!}
                        {!! Form::text('platform', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('analytics', 'Analytics:') !!}
                        {!! Form::text('analytics', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('credentials_user', 'Credentials username:') !!}
                        {!! Form::text('credentials_user', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('credentials_pass', 'Credentials password:') !!}
                        <br>
                        {!! Form::password('credentials_pass', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Add Site', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@stop