<div>
    <div class="d-flex justify-content-between">
        <a class="btn btn-info" href="{{route('input.add')}}" >Add Input in Single Page</a>
    </div>
    <br>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Operaion</th>
                <th scope="col">Label</th>
                <th scope="col">type</th>
                <th scope="col">event</th>
                <th scope="col">value</th>
                <th scope="col">Callback</th>
                <th scope="col">body</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inputs as $input)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$input->operation->title}}</td>
                    <td>{{$input->label}}</td>
                    <td>{{$input->type}}</td>
                    <td>{{$input->event}}</td>
                    <td>{{$input->value}}</td>
                    <td>{{$input->callback}}</td>
                    <td>{{$input->body}}</td>
                    <td>
                        @can('input.update')
                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#delete{{$input->id}}">Delete</a>
                        @endcan
                        {{--                    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#edit{{$input->id}}">Edit</a>
                                           --}}
                    </td>
                </tr>
                {{--            @include('operation.edit',['departments'=>$departments])
                            --}}
                @include('livewire.data.delete')
            @endforeach
            </tbody>
        </table>
    </div>

