@extends('dashboard-adminlte.parent')
@section('title', 'Permissions')
@section('content')


    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
            Add Permission
        </button>
    </div>
    @include('permissions.create')

    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Permission Name</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            {{--  Edit  --}}
                            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#edit{{$permission->id}}">Edit</a>
                            @include('permissions.edit')
                            {{--  End Edit  --}}
                            {{--  delete  --}}
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$permission->id}}">Delete</a>
                            @include('permissions.delete')
                            {{-- End  delete  --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
