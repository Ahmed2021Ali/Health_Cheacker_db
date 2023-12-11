<div class="modal fade" id="edit{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('role.update',$role->id) }}" method="post">
                @csrf
                @method('put')

                <div class="modal-body">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" value="{{$role->name}}" name="name" id="name"
                           aria-describedby="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="email" class="form-label">Permissions</label>
                    <br>
                    <input type="checkbox" id="select">All Permissions <br/>
                    <br/>
                    @foreach($permissions as $permission)
                        <input type="checkbox" name="permission[]"
                               value="{{ $permission->name }}"
                            {{ in_array($permission->name, $role->permissions->pluck('name')->toArray()) ? 'checked' : '' }} > {{$permission->name}}
                        <br/>
                    @endforeach
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit"> Update</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
<script language="JavaScript">
    document.getElementById('select').onclick = function() {
        var checkboxes = document.getElementsByName('permission[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>

