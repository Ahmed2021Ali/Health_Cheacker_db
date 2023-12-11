@extends('dashboard-adminlte.parent')
@section('title', 'Operation')
@section('content')
    @can('operation.store')
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                Add Operation
            </button>
        </div>
    @endcan
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">department</th>
            <th scope="col">Title</th>
            <th scope="col">value</th>
            <th scope="col">Job Name</th>
            <th scope="col">Server</th>
        </tr>
        </thead>
        <tbody>
        @foreach($operations as $operation)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$operation->department->title}}</td>
                <td>{{$operation->title}}</td>
                <td>{{$operation->value}}</td>
                <td>{{$operation->job_name}}</td>

                <td>
                    @can('operation.update')
                        <a class="btn btn-info" href="#" data-toggle="modal"
                           data-target="#edit{{$operation->id}}">Edit</a>
                    @endcan
                    @can('operation.delete')
                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$operation->id}}">Delete</a>
                    @endcan
                </td>
            </tr>
            @include('operation.edit',['departments'=>$departments])
            @include('operation.delete')
        @endforeach
        </tbody>
    </table>

    @include('operation.add',['departments'=>$departments])

@endsection
