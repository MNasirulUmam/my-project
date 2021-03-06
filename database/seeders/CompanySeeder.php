<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name_companie' => 'Alton',
                'email' => 'alton.indonesia@gmail.com',
                'logo' => '',
                'website_url' => 'https://site.alt-on.net',
            ],
            [
                'name_companie' => 'Shoope',
                'email' => 'support@shopee.co.id',
                'logo' => '',
                'website_url' => 'https://shoope.co.id',
            ]
        ];

        foreach ($companies as $company) {
            DB::table('companies')->insert($company);
        }
    }
}
