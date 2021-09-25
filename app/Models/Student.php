<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'gender'
    ];   

    /**
     * Get the course for the course group.
     */
    public function course_groups()
    {
        // return $this->hasMany(CourseGroup::class);
    }             
}
