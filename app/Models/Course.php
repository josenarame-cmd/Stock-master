<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Topic 3: Eloquent Model with $fillable (mass assignment)
 * Topic 4: Relationships — one course hasMany students
 */
class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description'];

    /**
     * A course has many students (one-to-many relationship).
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
