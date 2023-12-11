<div class="modal fade" id="show{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Job</h5>
            </div>
            <div class="modal-body">
                <p>{{\Str::limit(json_decode($job->payload)->data->command,295 )}}</p>
                <div>
                    @can('job.run')
                        <a wire:click="runJob({{$job}})" @if(isset($job->reserved_at)) wire:loading
                           @endif  class="btn btn-success col-5 text-center"> {{ __('Approve') }} </a>
                    @endcan
                    @can('job.delete')
                        <a wire:click="deleteJob({{$job}})" @if(isset($job->reserved_at)) wire:loading
                           @endif   class="btn btn-danger col-5 text-center"> {{ __('Delete') }} </a>
                    @endcan
                </div>
                @if(isset($job->reserved_at))
                    <h5 style="color: red">Is Running Now </h5>
                @endif
            </div>
            <br>
        </div>
    </div>
</div>


