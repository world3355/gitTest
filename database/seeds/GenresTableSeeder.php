<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Genre::create([
            'genre_name' => 'idol',
        ]);

        App\Genre::create([
            'genre_name' => 'poppin',
        ]);

        App\Genre::create([
            'genre_name' => 'B-boying',
        ]);

        App\Genre::create([
            'genre_name' => 'hiphop',
        ]);
    }
}
