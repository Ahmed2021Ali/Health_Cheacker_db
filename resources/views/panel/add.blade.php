<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Panel</h5>
            </div>
            <form action="{{route('panels.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="url"> Panel Url</label>
                    <input type="url" name="url" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="server"> Server </label>
                    <input type="text" name="server" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="db_name">Database Name</label>
                    <input type="text" name="db_name" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="port">UserName</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="modal-body">
                    <label for="port">Password</label>
                    <input type="text" name="password" class="form-control">
                </div>

                <div class="modal-body">
                    <label for="port">Port</label>
                    <input type="text" name="port" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
