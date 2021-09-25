<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            for ($i=2018; $i < 2023; $i++) { 
                // code...
                $semester = new Semester([
                    'year' => $i,
                    'season' => 'spring'
                ]);
                $semester->save();
                $semester = new Semester([
                    'year' => $i,
                    'season' => 'fall'
                ]);
                $semester->save();                
            }        
    }
}
