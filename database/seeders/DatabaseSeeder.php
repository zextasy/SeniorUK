<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(StudentSeeder::class);
        $this->call(LecturerSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CourseGroupSeeder::class);
        $this->call(StudentCourseGroupSeeder::class);
    }
}
