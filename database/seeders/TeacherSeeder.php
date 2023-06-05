<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@email.com',
            'status' => '1'
        ]);

        Teacher::create([
            'firstname' => 'John',
            'lastname' => 'Cena',
            'email' => 'johncena@email.com',
            'status' => '1'
        ]);
    }
}
