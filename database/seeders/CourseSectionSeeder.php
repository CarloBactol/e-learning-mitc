<?php

namespace Database\Seeders;

use App\Models\CourseSection;
use Illuminate\Database\Seeder;

class CourseSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSection::create([
            'course' => 'BSIT',
            'status' => '1',
        ]);
        CourseSection::create([
            'course' => 'BSIS',
            'status' => '1',
        ]);
        CourseSection::create([
            'course' => 'BSCS',
            'status' => '1',
        ]);
    }
}
