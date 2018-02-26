@extends('layouts.admin')


@section('content')
    @if(Session::has('deleted_media'))
        <p class="bg-danger">{{session('deleted_media')}}</p>
    @endif

    @if(Session::has('uploaded_media'))
        <p class="bg-danger">{{session('uploaded_media')}}</p>
    @endif

<h1>Media</h1>

    @if($photos)

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>

        <tbody>

        @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->path}}"></td>
                <td>{{$photo->created_at ? $photo->created_at : 'No date'}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn-small btn-danger']) !!}
                        </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    @endif

@stop