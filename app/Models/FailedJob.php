<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedJob extends Model
{
    use HasFactory;
    protected $fillable=['queue','user_id','ticket_id'];

    protected $table='failed_jobs';

    public function operation_job()
    {
        return $this->hasOne(OperationJob::class);
    }
}
