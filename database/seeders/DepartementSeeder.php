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
                'name_departement' => 'HR',
                'description' => 'Selecting job applicants',
            ],
            [
                'name_departement' => 'Marketing',
                'description' => 'Do promotion',
            ],
            
        ];

        foreach ($departements as $departement) {
            DB::table('departements')->insert($departement);
        }
    }
}
