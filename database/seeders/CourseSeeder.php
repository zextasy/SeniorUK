<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;
use App\Models\Semester;

// use Faker\Generator as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // \App\Models\Course::factory(1)->create();
        $semesters = Semester::all();
        foreach ($semesters as $semester) {
            // code...
            for ($i=0; $i < 10; $i++) { 
                // code...
                $course = new Course([
                    'name' => 'COURSE '.$i.' TST '.$i,
                ]);    
                $course->save();                
            }
        }        
    }
}
