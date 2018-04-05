@extends('layouts.admin')

@section('content')

    @if(Session::has('added_site'))
        <p class="bg-info">{{session('added_site')}}</p>
    @endif

    <div class="row">
        <h2>Add site</h2>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Site details</h4>
                </div>
                <div class="panel-body>">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Url</th>
                            <th>Platform</th>
                            <th>Description</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Analytics</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($sites)

                            @foreach($sites as $site)

                                <tr>
                                    <td>{{$site-url}}</td>
                                </tr>

                            @endforeach

                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop