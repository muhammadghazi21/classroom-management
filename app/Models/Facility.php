<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    public function has_facilities()
    {
        return $this->hasMany(HasFacility::class);
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_has_facilities');
    }
}
