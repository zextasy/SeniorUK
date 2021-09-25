<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'season'
    ];    

    public function getDisplayNameAttribute($value)
    {
        return $this->season.' '.$this->year;
    }

    /**
     * Get the course_group for the semester.
     */
    public function course_groups()
    {
        return $this->hasMany(CourseGroup::class);
    }        

}
