<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add operation</h5>
            </div>
            <form action="{{route('operation.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="role">Department</label>
                    <select name="department_id" id="department_id" class="form-control" required>
                        <option style="display:none" value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-body">
                    <label for="name">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="url"> Value</label>
                    <input type="text" name="value" class="form-control" required>
                </div>
                <div class="modal-body">
                    <label for="url"> Job name</label>
                    <input type="text" name="job_name" value="\App\Jobs\" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
