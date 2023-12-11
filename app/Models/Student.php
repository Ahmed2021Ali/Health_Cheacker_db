<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
   // protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'phone',
        'extend_month',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
