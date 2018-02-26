@extends('layouts.blog-post')




@section('content')


    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->path}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>

        <hr>


        <!-- Blog Comments -->

        @if(Session::has('comment_message'))
                {{session('comment_message')}}

        @endif


        @if(Auth::check())

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>

               {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                    <input type="hidden" name="post_id" value="{{$post->id}}">
                   <div class="form-group">
                       {!! Form::label('body', 'Comment:') !!}
                       {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                   </div>

                   <div class="form-group">
                       {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
                   </div>
               {!! Form::close() !!}


            </div>
        @endif

        <hr>

        <!-- Posted Comments -->


        @if(count($comments) > 0)

            @foreach($comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="{{$comment->photo}}" width="50px" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{$comment->author}}
                        <small>{{$comment->created_at->diffForhumans()}}</small>
                    </h4>
                    <p>{{$comment->body}}</p>

                    @if(count($comment->replies) > 0)

                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)

                            <!-- Nested Comment -->
                            <div id="nested" class="media">
                                <a class="pull-left" href="#">
                                    <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        {{$reply->author}}
                                        <small>{{$reply->created_at->diffForhumans()}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>
                            </div>

                            @endif
                        @endforeach
                    @endif
                        <div class="comment-reply-container">

                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                            <div class="comment-reply col-sm-8">

                                {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                                <div class="form-group reply-form">
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    {!! Form::label('body', 'Reply:') !!}
                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 1]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}

                            </div>

                        </div>
                        <!-- End Nested Comment -->

                </div>
            </div>
            @endforeach

        @endif

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>


@stop

@section('scripts')

    <script>

        $(".toggle-reply").click(function() {

            $(this).next().toggle();

        });

    </script>

@stop