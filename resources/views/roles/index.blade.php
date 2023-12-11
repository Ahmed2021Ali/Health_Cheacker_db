@extends('dashboard-adminlte.parent')
@section('title', 'Roles')

@section('content')
    <div class="pull-right">
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                Add role
            </button>
        </div>
        @include('roles.create',['permissions'=>$permissions])
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $role->name }}</td>
                <td>

                    {{--Edit--}}
                    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#edit{{$role->id}}">Edit</a>
                    @include('roles.edit',['role'=>$role,'permissions'=>$permissions])
                    {{-- End Edit--}}

                    {{--Show--}}
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#show{{$role->id}}">show</a>
                    @include('roles.show',['role'=>$role])
                    {{-- End Show--}}

                    {{--Delete--}}
                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$role->id}}">delete</a>
                    @include('roles.delete',['permissions'=>$permissions])
                    {{-- End Delete--}}

                </td>
            </tr>
        @endforeach
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@stop

@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@stop

