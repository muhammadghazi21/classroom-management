<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Building::upsert([
            [
                'id' => 1,
                'branf_id' => 1,
                'name' => 'asdjasod',
                'codeBuilding' => 'RF',
            ],
            [
                'id' => 2,
                'branf_id' => 1,
                'name' => 'asdjasod',
                'codeBuilding' => 'IDB',
            ],
            [
                'id' => 3,
                'branf_id' => 1,
                'name' => 'asdjasod',
                'codeBuilding' => 'RE',
            ],
        ], ['id'], ['name', 'codeBuilding']);
    }
}
