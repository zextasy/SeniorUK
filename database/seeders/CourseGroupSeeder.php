<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CourseGroup;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;


class CourseGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $courses = Course::all();
        $lecturers = Lecturer::pluck('id');
        $semesters = Semester::pluck('id');
        foreach ($courses as $course) {
            // code...
            for ($i=0; $i < 3; $i++) { 
                // code...
                $course_group = new CourseGroup([
                    'name' => ' GROUP '.$course->name.' '.$i,
                    'course_id' => $course->id,
                    'lecturer_id' => $lecturers->random(),
                    'semester_id' => $semesters->random(),
                ]);    
                $course_group->save();                                
            }

        }                
    }
}
