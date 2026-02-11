<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class classes extends Model
{
    use SoftDeletes;
    public function users()
    {
        return $this->hasMany(User::class, 'class_id');
    }
    public function absences()
    {
        return $this->hasMany(Absence::class, 'class_id');

    }

    protected $fillable = [
        'class_name',
        'limit_student',
        'is_active'
    ];
}
