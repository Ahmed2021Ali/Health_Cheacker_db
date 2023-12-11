<div class="modal fade" id="edit{{$operation->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Operation</h5>
            </div>
            <form action="{{route('operation.update',$operation->id)}}" method="post" autocomplete="off">
                @csrf
                @method('put')
                <div class="modal-body">
                    <label for="role">Department</label>
                    <select name="department_id" id="department_id" class="form-control" required>
                        <option style="display:none" value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option  {{ $department->id == $operation->department_id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-body">
                    <label for="name">Name</label>
                    <input type="text" name="title" value="{{$operation->title}}" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="url"> Value</label>
                    <input type="text" name="value" value="{{$operation->value}}" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
