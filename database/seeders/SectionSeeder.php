<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Section::create([
            'section' => 'Section A',
            'status' => '1',
        ]);
        Section::create([
            'section' => 'Section B',
            'status' => '1',
        ]);
        Section::create([
            'section' => 'Section C',
            'status' => '1',
        ]);
    }
}
