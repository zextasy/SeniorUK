<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Student;
use App\Models\CourseGroup;

class StudentCourseGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $students = Student::all();
        $course_groups = CourseGroup::pluck('id');
        foreach ($students as $student) {
            // code...
            $selected_course_groups = $course_groups->random(7);
            $student->course_groups()->attach($selected_course_groups);
        }
    }
}
