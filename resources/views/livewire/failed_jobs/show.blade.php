<div class="modal fade" id="show{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Job</h5>
            </div>
            <div class="modal-body">
                <p>{{\Str::limit(json_decode($job->payload)->data->command,295 )}}</p>

                <div class="col-12 mb-4">
                    <code> Queue = {{ $job->queue }} </code>
                </div>

                <div class="col-12 justify-content-around">
                    @can('job.run')
                        <a wire:click="run_failed_Job({{$job}})"
                           class="btn btn-success col-5 text-center"> {{ __('Approve') }} </a>
                    @endcan
                    @can('job.delete')
                        <a wire:click="delete_failed_Job({{$job}})"
                           class="btn btn-danger col-5 text-center"> {{ __('Delete') }} </a>
                    @endcan

                </div>
            </div>
            <br>
        </div>
    </div>
</div>


