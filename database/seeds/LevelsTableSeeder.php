<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Level::create([
            'level_name' => 'C',
        ]);

        App\Level::create([
            'level_name' => 'B',
        ]);

        App\Level::create([
            'level_name' => 'A',
        ]);
    }
}
