<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Job extends Model
{
    use HasFactory;

    protected $fillable=['user_id','ticket_id','queue'];


    protected $table="jobs";

    public function operation_job()
    {
        return $this->hasOne(OperationJob::class);
    }

}
