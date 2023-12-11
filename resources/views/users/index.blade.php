@extends('dashboard-adminlte.parent')
@section('title', 'Users')
@section('content')

    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
            Add User
        </button>
    </div>
    @include('users.create',['roles'=>$roles])

    <br>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{--  Edit  --}}
                            <a class="btn btn-info" href="#" data-toggle="modal"
                               data-target="#edit{{$user->id}}">Edit</a>
                            @include('users.edit', ['user' => $user,'roles'=>$roles])
                            {{--  End Edit  --}}

                            {{--  Delete  --}}
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$user->id}}">Delete</a>
                            @include('users.delete', ['user' => $user,'roles'=>$roles])
                            {{-- End  Delete  --}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

{{--@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d563fef7992e92090620', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('{{ auth()->user()->id }}', function(data) {
            --}}{{--
                alert(data.title);

            console.log(data.title)
            console.log(data.description)
            console.log(data.user_id)

            const noteTitle = data.title;
            const noteOptions = {
                body: data.description,
                icon: "https://www.simplilearn.com/ice9/free_resources_article_thumb/what_is_image_Processing.jpg",
            };
            new Notification(noteTitle, noteOptions);
             --}}{{--

            console.log(data)

            console.log(data.title)
            console.log(data.user_id)


            Swal.fire({
                title: data,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })

        });
    </script>
@stop--}}
