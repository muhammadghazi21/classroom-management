<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    
    /**
     * Get the branch_faculties(for the blog post.
     *   
     * Syntax: return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->hasMany(Comment::class, 'post_id', 'id');
     * 
     */
    public function branch_faculties()
    {
        return $this->hasMany(Branch_faculty::class, 'faculty_id', 'id');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'branch_faculties');
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function buildings()
    {
        return $this->hasManyThrough(Building::class, Branch_faculty::class, 'id', 'branch_faculty_id', 'id');
    }
}
