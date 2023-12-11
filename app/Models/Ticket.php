<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Ticket extends Model
{
    use HasFactory, LogsActivity, HasRoles;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['user_id',
                'department_id',
                'operation_id',
                'panel_id',
                'json',]);
    }

    protected $fillable = [
        'user_id',
        'department_id',
        'operation_id',
        'panel_id',
        'json',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function panel()
    {
        return $this->belongsTo(Panel::class, 'panel_id');
    }

    public function operation_job()
    {
        return $this->hasMany(OperationJob::class);
    }

}
