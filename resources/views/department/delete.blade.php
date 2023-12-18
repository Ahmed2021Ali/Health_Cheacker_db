<div class="modal fade" id="delete{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete department</h5>
            </div>
            <form action="{{route('department.delete',$department)}}" method="post" autocomplete="off">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h5>Are you sure to Delete ?</h5>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
