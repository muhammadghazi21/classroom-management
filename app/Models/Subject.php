<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function profesor_has_subjects()
    {
        return $this->hasMany(ProfesorHasSubject::class);
    }
    
    public function profesors()
    {
        return $this->belongsToMany(Profesor::class, 'profesor_has_subjects');
    }
}
