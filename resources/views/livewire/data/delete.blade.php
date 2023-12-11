<div class="modal fade" id="delete{{$input->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Operation</h5>
            </div>
                <div class="modal-body">
                    <h5>Are you sure to Delete ?</h5>
                </div>
                <div class="text-center">
                    <button wire:click="remove({{ $input->id }})" class="btn btn-danger">Remove</button>
                </div>
            <br>
        </div>
    </div>
</div>
