<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = [
            [
                'name' => 'HR',
                'description' => 'Selecting job applicants',
            ],
            [
                'name' => 'Marketing',
                'description' => 'Do promotion',
            ],
            
        ];

        foreach ($departements as $departement) {
            DB::table('departements')->insert($departement);
        }
    }
}
