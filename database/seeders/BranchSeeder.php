<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::upsert([
            [
                'id' => 1,
                'name' => 'Pusat',
                'address' => 'Jl. Colombo No.1 Caturtunggal, Depok, Yogyakarta',
                'city' => 'Sleman',
                'postcode' => '55281',
            ],
            [
                'id' => 2,
                'name' => 'UPP 1',
                'address' => 'Jl. Colombo No.1 Caturtunggal, Depok, Yogyakarta',
                'city' => 'Sleman',
                'postcode' => '55281',
            ],
            [
                'id' => 3,
                'name' => 'UPP 2',
                'address' => 'Jl. Colombo No.1 Caturtunggal, Depok, Yogyakarta',
                'city' => 'Sleman',
                'postcode' => '55281',
            ],
            [
                'id' => 4,
                'name' => 'UPP 3',
                'address' => 'Jl. Colombo No.1 Caturtunggal, Depok, Yogyakarta',
                'city' => 'Sleman',
                'postcode' => '55281',
            ]
        ], ['id'], ['name', 'address', 'city', 'postcode']);
    }
}
