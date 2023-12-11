<?php

namespace App\Jobs;

use App\Models\Student;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExtendMonth implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $input;
    public $ticket;

    public function __construct($input, $ticket)
    {
        $this->input = $input;
        $this->ticket = $ticket;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // take backup to BackupSave

        setDBConnection($this->ticket->panel);
        $connection_name = $this->ticket->panel->db_name;

        if(isset($this->input['level_id']))
        {
            $students = Student::on($connection_name)->where('level_id', $this->input['level_id'])->get();
        }
        else
        {
            $students = Student::on($connection_name)->get();
        }
        foreach ($students as $student)
        {
            if ("extend_month" == $this->ticket->operation->value)
            {
                $student->extend_month = $this->input['extend_month'];
            }
            elseif("add_month" == $this->ticket->operation->value)
            {
               $extend_date = $this->input['extend_month'];
            }
            $student->save();
        }

    }

}
