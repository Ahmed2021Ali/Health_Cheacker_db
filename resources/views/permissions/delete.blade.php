<div class="modal fade" id="delete{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">Delete permission</h5>
            </div>
            <form action="{{ route('permission.delete', $permission) }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <h3> Are you sure to delete ? </h3>
                    <button class="btn btn-danger btn-lg btn-block"> Yes</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>

