<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'department_name' => 'Department One',
            'person_incharge' => 'Carlo Pamor',
            'status' => '1',
        ]);

        Department::create([
            'department_name' => 'Department two',
            'person_incharge' => 'John Doe',
            'status' => '1',
        ]);

        Department::create([
            'department_name' => 'Department three',
            'person_incharge' => 'Mike Tyson',
            'status' => '1',
        ]);
    }
}
