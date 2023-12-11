<div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">queue</th>
            <th scope="col">Panel Name</th>
            <th scope="col"> Action Done BY  </th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jobs as $job)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$job->queue}}</td>
                <td>@if(isset($job->operation_job->ticket_id)){{$job->operation_job->ticket->panel->name}}@endif</td>
                <td>@if(isset($job->operation_job->ticket_id)){{$job->operation_job->ticket->user->name}}@endif</td>
                <td>
                    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#show{{$job->id}}">Show Job</a>
                    @include('livewire.jobs.show')
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
