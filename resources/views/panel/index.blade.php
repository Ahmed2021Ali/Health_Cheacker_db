@extends('dashboard-adminlte.parent')
@section('title', 'Panels')
@section('content')
    @can('panel.store')
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                Add Panel
            </button>
        </div>
    @endcan
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Panel Url</th>
            <th scope="col">Server</th>
            <th scope="col">db_Name</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Port</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($panels as $panel)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$panel->name}}</td>
                <td><a href="{{$panel->url}}">{{$panel->url}}</a></td>
                <td>{{$panel->server}}</td>
                <td>{{$panel->db_name}}</td>
                <td>{{$panel->username}}</td>
                <td>{{$panel->password}}</td>
                <td>{{$panel->port}}</td>
                <td>
                    @can('panel.update')
                        <a class="btn btn-info" href="#" data-toggle="modal" data-target="#edit{{$panel->id}}">Edit</a>
                    @endcan
                    @can('panel.delete')
                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$panel->id}}">Delete</a>
                    @endcan
                    @can('panel.show')
                        <a class="btn btn-success" href="{{route('panels.show',$panel)}}">Operation</a>
                    @endcan

                </td>
            </tr>
            @include('panel.edit')
            @include('panel.delete')
        @endforeach

        </tbody>
    </table>

    @include('panel.add')

@endsection

