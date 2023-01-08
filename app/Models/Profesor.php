<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function profesor_has_subjects()
    {
        return $this->hasMany(ProfesorHasSubject::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'profesor_has_subjects');
    }
}
