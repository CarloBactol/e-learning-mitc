<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'course' => 'BSIS',
            'section' => '1B',
            'id_number' => '21100617',
            'firstname' => 'Jade',
            'lastname' => 'Gordoncillo',
            'email' => 'gordoncillo@email.com',
            'status' => '1'
        ]);

        Student::create([
            'course' => 'BSIT',
            'section' => '2B',
            'id_number' => '21100277',
            'firstname' => 'Carlo',
            'lastname' => 'Bactol',
            'email' => 'carlobactol@email.com',
            'status' => '1'
        ]);

        Student::create([
            'course' => 'BSCS',
            'section' => '2B',
            'id_number' => '29000676',
            'firstname' => 'Katrina',
            'lastname' => 'Cruz',
            'email' => 'katrinacruz@email.com',
            'status' => '1'
        ]);
    }
}
