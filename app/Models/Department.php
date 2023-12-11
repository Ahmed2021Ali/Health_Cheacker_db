<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Department extends Model
{
    use HasFactory,LogsActivity,HasRoles;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title','value','panel_id'])->logOnlyDirty();
    }
    protected $fillable=['title','value','panel_id'];

    public function operation()
    {
        return $this->hasMany(Operation::class);
    }

    public function panel()
    {
        return $this->belongsTo(Panel::class);
    }
    public function GetDepartment()
    {
        return Department::all();
    }

}
