<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Topic 3: Eloquent Model with $fillable and SoftDeletes
 * Topic 4: Relationships — each student belongsTo a course
 */
class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'photo', 'course_id'];

    /**
     * A student belongs to one course (many-to-one relationship).
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
