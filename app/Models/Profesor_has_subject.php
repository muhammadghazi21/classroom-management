<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor_has_subject extends Model
{
    use HasFactory;

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function class_has_classroom()
    {
        return $this->hasOne(Class_has_classroom::class);
    }
}
