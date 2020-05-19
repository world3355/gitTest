<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'userid' => 'sample_01',
            'password' => bcrypt('1234'),
            'name' => '김상헌',
            'image' => null,
            'birthday' => '1999-06-10',
            'gender' => 0,  //0: 남, 1: 여
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕하세요. 삼성 라이온즈 응원단장 김상헌입니다.',
            'image' => 'user_images/01.jpg',
            'class' => 1,   //1: 연습생, 2: 전문가, 3:기업
            'rank_id'=> 1,  //1: C, 2: B, 3: A
            'company_id' => null,//기업용회원외래키
            'expert_id' => null,//전문가용외래키
        ]);

        App\User::create([
            'userid' => 'sample_02',
            'password' => bcrypt('1234'),
            'name' => '구자욱',
            'image' => null,
            'birthday' => '1942-07-10',
            'gender' => 0,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '좌익수는 올 해 처음이지만, 열심히 하겠습니다.',
            'class' => 1,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => null,
        ]);
        
        //전문가용 계정
        App\User::create([
            'userid' => 'idol_01',
            'password' => bcrypt('1234'),
            'name' => '김상수',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '대한민국 최고의 댄서입니당',
            'image' => 'user_images/03.jpg',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 1,
        ]);

        App\User::create([
            'userid' => 'idol_02',
            'password' => bcrypt('1234'),
            'name' => '김헌곤',
            'image' => null,
            'birthday' => '1995-02-24',
            'gender' => 0,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '독창적인 춤을 완성하는 나는...',
            'image' => 'user_images/04.jpg',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 2,
        ]);

        App\User::create([
            'userid' => 'idol_03',
            'password' => bcrypt('1234'),
            'name' => '이준호',
            'image' => null,
            'birthday' => '1990-1-25',
            'gender' => 0,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '하나 둘 안녕하세요- 2PM입니다. 우리집으로 오세요 ',
            'image' => 'user_images/05.jpg',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 3,
        ]);

        App\User::create([
            'userid' => 'idol_04',
            'password' => bcrypt('1234'),
            'name' => '유강남',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 0,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '무적 유강남 오오오오',
            'image' => 'user_images/06.jpg',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 4,
        ]);

        App\User::create([
            'userid' => 'poppin_01',
            'password' => bcrypt('1234'),
            'name' => '김민수',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 0,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 김민수야!',
            'image' => 'user_images/07.jpg',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 5,
        ]);

        App\User::create([
            'userid' => 'poppin_02',
            'password' => bcrypt('1234'),
            'name' => '앙드레',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 앙드레야.',
            'image' => 'user_images/08.jpg',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 6,
        ]);

        App\User::create([
            'userid' => 'poppin_03',
            'password' => bcrypt('1234'),
            'name' => '니알로',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 니알로야.',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 7,
        ]);

        App\User::create([
            'userid' => 'poppin_04',
            'password' => bcrypt('1234'),
            'name' => '애일리',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 애일리야.',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 8,
        ]);

        App\User::create([
            'userid' => 'B-boying_01',
            'password' => bcrypt('1234'),
            'name' => '고라니',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 고라니야.',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 9,
        ]);

        App\User::create([
            'userid' => 'B-boying_02',
            'password' => bcrypt('1234'),
            'name' => '홍길동',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 홍길동야',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 10,
        ]);

        App\User::create([
            'userid' => 'B-boying_03',
            'password' => bcrypt('1234'),
            'name' => '소라카',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 소라카야',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 11,
        ]);

        App\User::create([
            'userid' => 'B-boying_04',
            'password' => bcrypt('1234'),
            'name' => '박이즈',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 나는 박이즈야',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 12,
        ]);

        App\User::create([
            'userid' => 'hiphop_01',
            'password' => bcrypt('1234'),
            'name' => '힙합맨1',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 난 힙합 요정이야',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 13,
        ]);

        App\User::create([
            'userid' => 'hiphop_02',
            'password' => bcrypt('1234'),
            'name' => '힙합맨2',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 난 힙합 요정이야',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 14,
        ]);

        App\User::create([
            'userid' => 'hiphop_03',
            'password' => bcrypt('1234'),
            'name' => '힙합맨3',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 난 힙합 요정이야',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 15,
        ]);

        App\User::create([
            'userid' => 'hiphop_04',
            'password' => bcrypt('1234'),
            'name' => '힙합맨4',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 난 힙합 요정이야',
            'class' => 2,
            'rank_id'=> 3,
            'company_id' => null,
            'expert_id' => 16,
        ]);

        //기업용
        App\User::create([
            'userid' => 'company_01',
            'password' => bcrypt('1234'),
            'name' => '이과장',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 저는 이과장입니다.',
            'class' => 3,
            'rank_id'=> 1,
            'company_id' => 1,
            'expert_id' => null,
        ]);

        App\User::create([
            'userid' => 'company_02',
            'password' => bcrypt('1234'),
            'name' => '무대리',
            'image' => null,
            'birthday' => '1996-08-10',
            'gender' => 1,
            'address' => '대구광역시',
            'call_number' => '010-0000-0000',
            'introduction' => '안녕 저는 무대리입니다.',
            'class' => 3,
            'rank_id'=> 1,
            'company_id' => 2,
            'expert_id' => null,
        ]);

    }
}
