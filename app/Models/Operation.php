<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Operation extends Model
{
    use HasFactory,LogsActivity,HasRoles;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title','value','json','department_id'])->logOnlyDirty();
    }

    protected $fillable=['title','value','json','department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function GetOperation()
    {
        return Operation::all();
    }

    public function input()
    {
        return $this->hasMany(Input::class);
    }


}
