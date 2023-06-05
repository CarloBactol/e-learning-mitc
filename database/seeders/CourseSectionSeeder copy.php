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
            'section' => 'M14CC00',
            'status' => '1',
        ]);
        CourseSection::create([
            'course' => 'BSIS',
            'section' => 'M11DD00',
            'status' => '1',
        ]);
        CourseSection::create([
            'course' => 'BSCE',
            'section' => 'M12FF00',
            'status' => '1',
        ]);
    }
}
