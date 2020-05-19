<?php

use Illuminate\Database\Seeder;

class ResumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::find(1)->resumes()->create([
            'score' => 80.5,
            'message' => '꼭 합격하고싶습니다.',
            'audition_id' => 5,
        ]);
    }
}
