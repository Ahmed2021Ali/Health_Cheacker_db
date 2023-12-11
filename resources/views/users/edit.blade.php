<div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            </div>
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @method('put')
                @csrf

                <div class="modal-body">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name"
                           aria-describedby="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="email"
                           aria-describedby="email" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" value="" name="password" id="password"
                           aria-describedby="password" >
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="password" class="form-label">Conform Password</label>
                    <input type="password" class="form-control" value="" name="password_confirmation" id="password"
                           aria-describedby="password" >
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-body">
                    <label for="role" class="form-label">Role</label>
                    <br/>
                    @foreach($roles as $role)
                        <input type="checkbox" name="role[]"  {{ in_array($role, $roleUser= $user->roles->pluck('name')->toArray()) ? 'checked' : '' }} value="{{$role}}"> {{$role}}
                        <br/>
                    @endforeach
                </div>

                <div class="text-center">
                    <button class="btn btn-info" type="submit"> Update</button>
                </div>

            </form>
            <br>
        </div>
    </div>
</div>

