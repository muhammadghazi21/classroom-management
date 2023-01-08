<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'classroom_has_facilities');
    }

    public function class_has_classroom()
    {
        return $this->hasOne(Class_has_classroom::class);
    }
}
