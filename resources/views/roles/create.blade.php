<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Permissions</h5>
            </div>
            <form action="{{ route('role.store') }}" method="post">
                @csrf

                <div class="modal-body">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="email" class="form-label">Permissions</label>
                    <br/>
                    <input type="checkbox" id="select-all">All Permissions <br/>
                    <br/>
                    @foreach($permissions as $permission)
                        <input type="checkbox" name="permissions[]"  value="{{$permission->name}}"> {{$permission->name}}
                        <br/>
                    @endforeach
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit"> Add</button>
                </div>
            </form>
            <br>
        </div>
        <br>
    </div>
</div>
<script language="JavaScript">
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.getElementsByName('permissions[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>

