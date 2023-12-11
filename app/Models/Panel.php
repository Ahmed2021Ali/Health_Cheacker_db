<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Panel extends Model
{

    use HasFactory,LogsActivity,HasRoles;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name','url','server','db_name','username','password','port'])->logOnlyDirty();
    }

    protected $connection = 'mysql';
    protected $table = 'panels';

    protected $fillable=['name','url','server','db_name','username','password','port'];

/*    public function __construct()
    {
        $this->connection = Helper::getDatabaseName();

    }*/

    public function department()
    {
        return $this->hasMany(Department::class);
    }
    public function GetPanel()
    {
        return Panel::all();
    }
    public static function boot()
    {
        parent::boot();
    }
}
