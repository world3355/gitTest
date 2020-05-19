<?php

use Illuminate\Database\Seeder;

class LectureUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\LectureUser::create([
            'accuracy' => 92.1,
            'clear' => 1,
            'user_id' => 1,
            'lecture_id'=> 2,
        ]);

        \App\LectureUser::create([
            'accuracy' => 85.3,
            'clear' => 1,
            'user_id' => 1,
            'lecture_id'=> 3,
        ]);
    }
}
