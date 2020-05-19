<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }

        App\Rank::truncate();
        $this->call(RanksTableSeeder::class);

        App\Specialty::truncate();
        $this->call(SpecialtiesTableSeeder::class);

        App\Company::truncate();
        $this->call(CompaniesTableSeeder::class);

        App\Expert::truncate();
        $this->call(ExpertsTableSeeder::class);

        App\Level::truncate();
        $this->call(LevelsTableSeeder::class);

        App\Genre::truncate();
        $this->call(GenresTableSeeder::class);

        App\Lecture::truncate();
        $this->call(LecturesTableSeeder::class);

        App\User::truncate();
        $this->call(UsersTableSeeder::class);

        App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);

        App\Genre::truncate();
        $this->call(GenresTableSeeder::class);

        App\Level::truncate();
        $this->call(LevelsTableSeeder::class);

        App\Lecture::truncate();
        $this->call(LecturesTableSeeder::class);

        App\Contest::truncate();
        $this->call(ContestsTableSeeder::class);

        App\Audition::truncate();
        $this->call(AuditionsTableSeeder::class);
        
        App\Resume::truncate();
        $this->call(ResumesTableSeeder::class);

        App\LectureUser::truncate();
        $this->call(LectureUserTableSeeder::class);

        if(config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
