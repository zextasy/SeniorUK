<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];   
    /**
     * Get the lecturer for the course group.
     */
    public function lecturers()
    {
        return $this->hasManyThrough(Lecturer::class, CourseGroup::class);
    }
    /**
     * Get the semester for the course_group.
     */
    public function semesters()
    {
        return $this->hasManyThrough(Semester::class, CourseGroup::class);
    }                 
    /**
     * Get the students for the course group.
     */
    public function students()
    {
        // Use Pivot
        return $this->hasManyThrough(Student::class, CourseGroup::class);
    }


}
