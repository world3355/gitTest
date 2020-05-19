<?php

use Illuminate\Database\Seeder;

class ContestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Contest::create([
            'title' => 'contest_title_1',
            'content' => 'contest_content_1',
            'video' => 'contest_video_1',
            'image' => 'contest_image_1',
        ]);
        App\Contest::create([
            'title' => 'contest_title_2',
            'content' => 'contest_content_2',
            'video' => 'contest_video_2',
            'image' => 'contest_image_2',
        ]);
        App\Contest::create([
            'title' => 'contest_title_3',
            'content' => 'contest_content_3',
            'video' => 'contest_video_3',
            'image' => 'contest_image_3',
        ]);
        App\Contest::create([
            'title' => 'contest_title_4',
            'content' => 'contest_content_4',
            'video' => 'contest_video_4',
            'image' => 'contest_image_4',
        ]);
        App\Contest::create([
            'title' => 'contest_title_5',
            'content' => 'contest_content_5',
            'video' => 'contest_video_5',
            'image' => 'contest_image_5',
        ]);
    }
}
