<?php

namespace App\Livewire;

use App\Jobs\actionRunningJob;
use App\Jobs\BackupJob;
use App\Jobs\RunningActionJob;
use App\Models\FailedJob;
use App\Models\Job;
use App\Models\OperationJob;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\BackupDestination\BackupDestinationFactory;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class RunningActionJobs extends Component
{
    public $jobs;

    public function mount()
    {
        $this->jobs = Job::where('queue', '!=', 'default')->get();
    }

    public function runJob(Job $job)
    {
        // update user_id
        $operation = OperationJob::where('queue', $job->queue)->first();
        $operation->user_id = auth()->user()->id;
        $operation->save();
        // backup of database before running of job -> before changes was been Done
      //  add_db_backup($operation->ticket->panel);
        //  dd(\config('backup.backup.source'));
        BackupJob::dispatch($operation->ticket->panel);
        RunningActionJob::dispatch($job->queue);

        return redirect()->route('jobs')->with('success', 'Running Job successfully');
    }

    public function deleteJob(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs')->with('success', 'Delete Job successfully');
    }

    public function render()
    {
        return view('livewire.running-action-jobs')->layout('dashboard-adminlte.jobs');
    }
}
