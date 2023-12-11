<div class="modal fade" id="edit{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Panel</h5>
            </div>
            <form action="{{route('department.update',$department->id)}}" method="post" autocomplete="off">
                @csrf
                @method('put')
                <div class="modal-body">
                    <label for="role">Department</label>
                    <select name="panel_id" id="panel_id" class="form-control" required>
                        <option style="display:none" value="">Select User</option>
                        @foreach ($panels as $panel)
                            <option  {{ $panel->id == $department->panel_id ? 'selected' : '' }} value="{{ $panel->id }}">{{ $panel->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-body">
                    <label for="name">Name</label>
                    <input type="text" name="title" value="{{$department->title}}" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="url"> Value</label>
                    <input type="text" name="value" value="{{$department->value}}" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
