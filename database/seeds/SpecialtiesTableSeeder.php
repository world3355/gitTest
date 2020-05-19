<?php

use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Specialty::create([
            'area' => 'idol',
        ]);

        App\Specialty::create([
            'area' => 'poppin',
        ]);

        App\Specialty::create([
            'area' => 'B-boying',
        ]);

        App\Specialty::create([
            'area' => 'hiphop',
        ]);
    }
}
