<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class OperationJob extends Model
{
    use HasFactory,LogsActivity,HasRoles;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['user_id', 'ticket_id','status','job_id','failed_job_id','queue'])->logOnlyDirty();
    }
    protected $fillable=['user_id', 'ticket_id','status','job_id','failed_job_id','queue'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function failed_job()
    {
        return $this->belongsTo(FailedJob::class);
    }

}
