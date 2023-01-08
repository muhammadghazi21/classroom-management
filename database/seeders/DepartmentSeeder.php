<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        Department::upsert([
            [
                'id' => 1,
                'faculty_id' => 1,
                'name' => 'Pendidikan Teknik Elektronika dan Informatika',
                'codeDepartment' => 'JPTEI',
            ],
            [
                'id' => 2,
                'faculty_id' => 2,
                'name' => 'asdojpojasd',
                'codeDepartment' => 'PTBB',
            ],
            [
                'id' => 3,
                'faculty_id' => 3,
                'name' => 'Paasdad Bahasa Inggris',
                'codeDepartment' => 'Elektro',
            ],
            [
                'id' => 4,
                'faculty_id' => 1,
                'name' => 'sadadsad Bahasa Jepang',
                'codeDepartment' => 'PTSP',
            ],
            [
                'id' => 5,
                'faculty_id' => 1,
                'name' => 'Pasdasd',
                'codeDepartment' => 'FIS',
            ],
        ], ['id'], ['faculty_id', 'name', 'codeDepartment']);
    }
}
