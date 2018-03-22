@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_post'))
            <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    @if(Session::has('updated_post'))
        <p class="bg-danger">{{session('updated_post')}}</p>
    @endif

    @if(Session::has('created_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif

    <h1>Posts</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Post</th>
            <th>Id</th>
            <th>User</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Meta title</th>
            <th>Meta description</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>

    <tbody>
    @if($posts)
        @foreach($posts as $post)
        <tr>
            <td><a href="{{route('home.post', $post->slug)}}">View post</a> </td>
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td><img width="100" src="{{$post->photo ? $post->photo->path : 'http://placehold.it/100x100'}}"=</td>
            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
            <td>{{$post->body}}</td>
            <td>{{$post->meta_title}}</td>
            <td>{{$post->meta_desc}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
        </tr>
        @endforeach
    @endif

    </tbody>
</table>

    <div class="row">
        <div class="col-sm-5 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@stop