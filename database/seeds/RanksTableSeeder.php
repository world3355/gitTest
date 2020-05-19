<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Rank::create([
            'rank_name' => 'C',
            'criterion' => 50,
        ]);

        App\Rank::create([
            'rank_name' => 'B',
            'criterion' => 70,
        ]);

        App\Rank::create([
            'rank_name' => 'A',
            'criterion' => 90,
        ]);
    }
}
