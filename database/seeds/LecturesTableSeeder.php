<?php

use Illuminate\Database\Seeder;

class LecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Lecture::create([
            'title' => '매우쉬운 아이돌 댄스',
            'content' => '이거슨 쉬운 아이돌 댄스입니다잉',
            'video' => 'sample3',
            'image' => 'LectureImg/01.jpg',
            'genre_id' => 1,
            'level_id' => 1,
        ]);

        App\Lecture::create([
            'title' => '적당한 아이돌 댄스',
            'content' => '이거슨 적당한 아이돌 댄스입니다잉',
            'video' => '나중에 넣어',
            'image' => 'LectureImg/02.jpg',
            'genre_id' => 1,
            'level_id' => 2,
        ]);

        App\Lecture::create([
            'title' => '어려운 아이돌 댄스',
            'content' => '이거슨 어려운 아이돌 댄스입니다잉',
            'video' => '나중에 넣어',
            'image' => 'LectureImg/03.jpg',
            'genre_id' => 1,
            'level_id' => 3,
        ]);
        App\Lecture::create([
            'title' => '매우쉬운 팝핀 댄스',
            'content' => '이거슨 쉬운 팝핀 댄스입니다잉',
            'video' => '나중에 넣어',
            'image' => 'LectureImg/04.jpg',
            'genre_id' => 2,
            'level_id' => 1,
        ]);

        App\Lecture::create([
            'title' => '적당한 팝핀 댄스',
            'content' => '이거슨 적당한 팝핀 댄스입니다잉',
            'video' => '나중에 넣어',
            'image' => 'LectureImg/05.jpg',
            'genre_id' => 2,
            'level_id' => 2,
        ]);

        App\Lecture::create([
            'title' => '어려운 팝핀 댄스',
            'content' => '이거슨 어려운 팝핀 댄스입니다잉',
            'video' => '나중에 넣어',
            'image' => 'LectureImg/06.jpg',
            'genre_id' => 2,
            'level_id' => 3,
        ]);
    }
}
