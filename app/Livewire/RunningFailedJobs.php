<?php

namespace App\Livewire;

use App\Jobs\ActionRunningJob;
use App\Models\Job;
use App\Models\FailedJob;
use App\Models\OperationJob;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class RunningFailedJobs extends Component
{
    public  $jobs_failed;

    public function mount()
    {
        $this->jobs_failed = FailedJob::where('queue','!=','default')->get();
        $this->operation_job($this->jobs_failed);
    }

    public function run_failed_Job(FailedJob $job)
    {
        dispatch(function() use ($job){
            Artisan::call('queue:retry --queue='.$job->queue);
        });

        OperationJob::where('queue','=',$job->queue)->update([
            'user_id'=>auth()->user()->id,
        ]);

        return redirect()->route('failed_jobs')->with('success','Running Job successfully');
    }

    public function delete_failed_Job(FailedJob $job)
    {
        $job->delete();
        return redirect()->route('failed_jobs')->with('success','delete Job successfully');
    }

    public function render()
    {
        return view('livewire.running-failed-jobs')->layout('dashboard-adminlte.failed_jobs');;
    }

    public function operation_job($jobs_failed)
    {
        if(isset($jobs_failed))
        {
            foreach ($jobs_failed as $job)
            {
                    $operation_job = OperationJob::where('queue',$job->queue)->first();
                    if(isset($operation_job))
                    {
                        $operation_job->failed_job_id = $job->id;
                        $operation_job->job_id = null;
                        $operation_job->save();
                    }
            }
        }

    }


}
