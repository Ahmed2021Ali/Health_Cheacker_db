<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Input extends Model
{
    use HasFactory,LogsActivity,HasRoles;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['operation_id','label','type','event','value','callback','body'])->logOnlyDirty();
    }
    protected $fillable=['operation_id','label','type','event','value','callback','body'];

    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
    public function GetInput()
    {
        return Input::all();
    }
}
