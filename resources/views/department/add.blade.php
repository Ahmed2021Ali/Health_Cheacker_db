<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add department</h5>
            </div>
            <form action="{{route('department.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="role">Panels</label>
                    <select name="panel_id" id="panel_id" class="form-control" required>
                        <option style="display:none" value="">Select Panel</option>
                        @foreach ($panels as $panel)
                            <option value="{{ $panel->id }}">{{ $panel->name }}</option>
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

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
