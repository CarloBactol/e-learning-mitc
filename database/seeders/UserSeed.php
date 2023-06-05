<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'           => 'admin',
                'id_number'           => 'STID001120',
                'course'           => null,
                'department' => null,
                'firstname' => 'Admin',
                'lastname' => "null",
                'email'          => 'admin@email.com',
                'password'       => bcrypt('adminpass'),
                'remember_token' => null,
                'role_as' => 1,
            ],
            [
                'name'           => 'student test',
                'id_number'           => 'STID001121',
                'course'           => 'BSIT',
                'department' => null,
                'firstname' => 'Student',
                'lastname' => "null",
                'email'          => 'student@email.com',
                'password'       => bcrypt('studentpass'),
                'remember_token' => null,
                'role_as' => 0,
            ],
            [
                'name'           => 'Leah Ticman',
                'id_number'           => 'STID001122',
                'course'           => 'BSIT',
                'department' => null,
                'firstname' => 'Leah',
                'lastname' => "Ticman",
                'email'          => 'leah@email.com',
                'password'       => bcrypt('leahpass'),
                'remember_token' => null,
                'role_as' => 0,
            ],
            [
                'name'           => 'Teacher Test',
                'id_number'           => 'STID001123',
                'course'           => null,
                'department' => 'Department one',
                'firstname' => 'Teacher',
                'lastname' => "null",
                'email'          => 'teacher@email.com',
                'password'       => bcrypt('teacherpass'),
                'remember_token' => null,
                'role_as' => 2,
            ],
        ];


        User::insert($users);
    }
}
