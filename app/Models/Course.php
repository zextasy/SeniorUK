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
     * Get the course groups for the course.
     */
    public function course_groups()
    {
        return $this->hasMany(CourseGroup::class);
    }    
    /**
     * Get the lecturers for the course.
     */
    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class, CourseGroup::class);
    }
    /**
     * Get the semesters for the course_group.
     */
    public function semesters()
    {
        return $this->belongsToMany(Semester::class, CourseGroup::class);
    }                 
    /**
     * Get the students for the course.
     */
    public function students()
    {
        // Use Pivot
        // return $this->belongsToMany(Student::class, CourseGroup::class);
    }


}
