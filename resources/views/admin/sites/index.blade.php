@extends('layouts.admin')




@section('content')

    <div class="row">
        <h3>Sites</h3>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>All available sites</h4>
                </div>
                <div class="panel-body">
                    @if($sites)

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Url</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sites as $site)

                                <tr>
                                    <td>{{$site->url}}</td>
                                    <td>{{$site->description}}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>

@stop