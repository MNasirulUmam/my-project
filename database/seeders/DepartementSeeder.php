<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            Departement::create($departement);
        }
    }
}
