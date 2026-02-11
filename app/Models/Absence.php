<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public function classes()
    {
        return $this->belongsTo(classes::class, 'class_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $fillable = [
        'class_id',
        'user_id',
    ];

}
