<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'subject_code' => 'ABC000',
            'subject_name' => 'English',
            'number_of_units' => '10',
            'semester' => '1',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, quia!',
            'status' => '1'
        ]);

        Subject::create([
            'subject_code' => 'UU000',
            'subject_name' => 'Math',
            'number_of_units' => '10',
            'semester' => '2',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, quia!',
            'status' => '1'
        ]);

        Subject::create([
            'subject_code' => 'ABC000',
            'subject_name' => 'Filipino',
            'number_of_units' => '20',
            'semester' => '2',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, quia!',
            'status' => '0'
        ]);
    }
}
