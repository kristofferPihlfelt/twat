@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    @if(Session::has('updated_user'))
        <p class="bg-danger">{{session('updated_user')}}</p>
    @endif
    @if(Session::has('created_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>

        <tbody>

        @if($users)

            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img width="50" src="{{$user->photo ? $user->photo->getUserPhoto($user->photo->path) : 'https://placehold.it/50x50'}}" alt="" class="img-responsive img-rounded"></td>
                <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                <td>{{$user->created_at->DiffForHumans()}}</td>
                <td>{{$user->updated_at->DiffForHumans()}}</td>
            </tr>
            @endforeach

        @endif
        </tbody>
    </table>



@stop