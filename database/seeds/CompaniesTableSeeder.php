<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Company::create([
            'company_name' => 'YG 엔터테인먼트',
            'business_number' => '28199210'
        ]);

        App\Company::create([
            'company_name' => 'JYP',
            'business_number' => '39019281'
        ]);
    }
}
