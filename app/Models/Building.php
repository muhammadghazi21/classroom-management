<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public function branch_faculty()
    {
        return $this->belongsTo(Branch_faculty::class, 'branf_id', 'id');
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
