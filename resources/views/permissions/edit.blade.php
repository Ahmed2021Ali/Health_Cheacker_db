<div class="modal fade" id="edit{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Permission</h5>
            </div>
            <form action="{{ route('permission.update', $permission->id) }}" method="post">
                @method('put')
                @csrf


                <div class="modal-body">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $permission->name }}" id="name"
                           aria-describedby="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="text-center">
                    <button class="btn btn-info" type="submit"> Update</button>
                </div>

            </form>
            <br>
        </div>
    </div>
</div>

