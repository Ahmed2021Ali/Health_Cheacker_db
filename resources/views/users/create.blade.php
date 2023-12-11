<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf

                <div class="modal-body">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="email" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                           aria-describedby="password" required>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="password" class="form-label">Conform Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password"
                           aria-describedby="password" required>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="role" class="form-label">Role</label>
                    <br/>
                    @foreach($roles as $role)
                        <input type="checkbox" name="role[]"  value="{{$role}}"> {{$role}}
                        <br/>
                    @endforeach
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit"> Add</button>
                </div>

            </form>
            <br>
        </div>
    </div>
</div>
