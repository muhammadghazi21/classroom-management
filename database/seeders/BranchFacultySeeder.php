<?php

namespace Database\Seeders;

use App\Models\Branch_faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Branch 1
        // Fakultas Teknik
        Branch_faculty::upsert([
            [
                'branch_id' => 1,
                'faculty_id' => 1,
            ]
        ], ['branch_id', 'faculty_id'], []);

        // Branch 2
        // Fakultas Teknik
        Branch_faculty::upsert([
            [
                'branch_id' => 2,
                'faculty_id' => 1,
            ]
        ], ['branch_id', 'faculty_id'], []);

        // Branch 3
        // Fakultas Teknik
        Branch_faculty::upsert([
            [
                'branch_id' => 3,
                'faculty_id' => 1,
            ]
        ], ['branch_id', 'faculty_id'], []);

        // Branch 4
        // Fakultas Teknik
        Branch_faculty::upsert([
            [
                'branch_id' => 4,
                'faculty_id' => 1,
            ]
        ], ['branch_id', 'faculty_id'], []);
    }
}
