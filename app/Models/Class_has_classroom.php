<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_has_classroom extends Model
{
    use HasFactory;

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function profesor_has_subject()
    {
        return $this->belongsTo(Profesor_has_subject::class);
    }
}
