<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::upsert([
            [
                'id' => 1,
                'name' => 'Fakultas Teknik',
            ],
            [
                'id' => 2,
                'name' => 'Fakultas Ekonomi',
            ],
            [
                'id' => 3,
                'name' => 'Fakultas Ilmu Sosial',
            ]
            ], ['id'], ['name']);
    }
}
