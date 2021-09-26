<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'lecturer_id',
        'semester_id',
    ];  


    /**
     * Get the course for the course group.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }                     
    /**
     * Get the lecturer for the course group.
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
    /**
     * Get the semester for the course_group.
     */
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }                 
    /**
     * Get the students for the course group.
     */
    public function students()
    {
        // return $this->belongsTo(Lecturer::class);
    }
}
