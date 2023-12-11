<div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">queue</th>
            <th scope="col">Panel Name</th>
            <th scope="col">Action Done BY  </th>
            <th scope="col">Done Job BY  </th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jobs_failed as $job)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$job->queue}}</td>
                <td>@if(isset($job->operation_job->ticket_id)){{$job->operation_job->ticket->panel->name}}@endif</td>
                <td>@if(isset($job->operation_job->ticket_id)){{$job->operation_job->ticket->user->name}}@endif</td>
                <td>@if(isset($job->operation_job->user_id)){{$job->operation_job->user->name}}@endif</td>
                <td>
                    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#show{{$job->id}}">Show Job</a>
                    @include('livewire.Failed_jobs.show')
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
