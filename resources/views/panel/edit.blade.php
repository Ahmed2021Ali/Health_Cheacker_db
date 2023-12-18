<div class="modal fade" id="edit{{$panel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Panel</h5>
            </div>
            <form action="{{route('panels.update',$panel)}}" method="post" autocomplete="off">
                @csrf
                @method('put')
                <div class="modal-body">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$panel->name}}" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="url"> Panel Url</label>
                    <input type="url" name="url" value="{{$panel->url}}" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="server"> Server </label>
                    <input type="text" name="server" value="{{$panel->server}}" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="db_name">Database Name</label>
                    <input type="text" name="db_name" value="{{$panel->db_name}}" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="port">UserName</label>
                    <input type="text" name="username" value="{{$panel->username}}" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="port">Password</label>
                    <input type="text" name="password" value="{{$panel->password}}" class="form-control">
                </div>

                <div class="modal-body">
                    <label for="port">Port</label>
                    <input type="text" name="port" value="{{$panel->port}}" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
