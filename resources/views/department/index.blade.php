@extends('dashboard-adminlte.parent')
@section('title', 'Department')
@section('content')
    @can('department.store')
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                Add Department
            </button>
        </div>
    @endcan
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Panel</th>
            <th scope="col">Title</th>
            <th scope="col">value</th>
            <th scope="col">Server</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$department->panel->name}}</td>
                <td>{{$department->title}}</td>
                <td>{{$department->value}}</td>
                <td>
                    @can('department.update')
                        <a class="btn btn-info" href="#" data-toggle="modal"
                           data-target="#edit{{$department->id}}">Edit</a>
                    @endcan
                    @can('department.delete')
                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$department->id}}">Delete</a>
                    @endcan
                </td>
            </tr>
            @include('department.edit',['panels'=>$panels])
            @include('department.delete')
        @endforeach
        </tbody>
    </table>

    @include('department.add',['panels'=>$panels])

@endsection
