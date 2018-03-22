<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    @yield('styles')



</head>

<body id="admin-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        <div class="navbar-header">
            
        </div>
        <!-- /.navbar-header -->


        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('users.edit', Auth::user()->id)}}"><i class="fa fa-user fa-fw"></i>User profile </a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <!-- search -->
                    <li class="sidebar-dashboard">
                        <a href="{{ URL::to('/admin/') }}" id="btn-0">
                            <i class="fa fa-dashboard fa-fw"></i> Dashboard
                        </a>
                    </li>



                    <nav>
                        <ul class="nav">
                            <li>
                                <a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">
                                    <i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span>
                                </a>
                                <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1">
                                    <li><a href="{{route('users.index')}}">All Users</a></li>
                                    <li><a href="{{route('users.create')}}">Create User</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" id="btn-2" data-toggle="collapse" data-target="#submenu2" aria-expanded="false">
                                    <i class="fa fa-paragraph fa-fw"></i> Posts<span class="fa arrow"></span>
                                </a>
                                <ul class="nav collapse" id="submenu2" role="menu" aria-labelledby="btn-2">
                                    <li> <a href="{{route('posts.index')}}">All Posts</a></li>
                                    <li><a href="{{route('posts.create')}}">Create Post</a></li>
                                    <li><a href="{{route('comments.index')}}">Comments</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" id="btn-3" data-toggle="collapse" data-target="#submenu3" aria-expanded="false">
                                    <i class="fa fa-folder fa-fw"></i> Categories<span class="fa arrow"></span>
                                </a>
                                <ul class="nav collapse" id="submenu3" role="menu" aria-labelledby="btn-3">
                                    <li><a href="{{route('categories.index')}}">All Categories</a></li>
                                    <li><a href="{{route('categories.create')}}">Create Category</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" id="btn-4" data-toggle="collapse" data-target="#submenu4" aria-expanded="false">
                                    <i class="fa fa-image fa-fw"></i> Media<span class="fa arrow"></span>
                                </a>
                                <ul class="nav collapse" id="submenu4" role="menu" aria-labelledby="btn-4">
                                    <li><a href="{{route('media.index')}}">All Media</a></li>
                                    <li><a href="{{route('media.create')}}">Upload Media</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" id="btn-5" data-toggle="collapse" data-target="#submenu5" aria-expanded="false">
                                    <i class="fa fa-tasks fa-fw"></i> Tasks<span class="fa arrow"></span>
                                </a>
                                <ul class="nav collapse" id="submenu5" role="menu" aria-labelledby="btn-5">
                                    <li><a href="{{route('tasks.index')}}">Todo</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" id="btn-6" data-toggle="collapse" data-target="#submenu6" aria-expanded="false">
                                    <i class="fa fa-calendar fa-fw"></i> Events<span class="fa arrow"></span>
                                </a>
                                <ul class="nav collapse" id="submenu6" role="menu" aria-labelledby="btn-6">
                                    <li><a href="{{route('events.index')}}">All events</a></li>
                                    <li><a href="{{route('events.create')}}">Create event</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
</div>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

               @yield('content')

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>


@yield('scripts')


</body>

</html>
