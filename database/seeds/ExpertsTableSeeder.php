<?php

use Illuminate\Database\Seeder;

class ExpertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Specialty::find(1)->experts()->create([//idol 전문가1호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(1)->experts()->create([//idol 전문가2호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(1)->experts()->create([//idol 전문가3호
            'sns' => '인스타그램',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(1)->experts()->create([//idol 전문가4호
            'sns' => '카카오스토리',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(2)->experts()->create([//poppin 전문가1호
            'sns' => '인스타그램',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);

        App\Specialty::find(2)->experts()->create([//poppin 전문가2호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);

        App\Specialty::find(2)->experts()->create([//poppin 전문가3호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);

        App\Specialty::find(2)->experts()->create([//poppin 전문가4호
            'sns' => '인스타그램',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);

        App\Specialty::find(3)->experts()->create([//B-boying 전문가1호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(3)->experts()->create([//B-boying 전문가2호
            'sns' => '인스타그램',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(3)->experts()->create([//B-boying 전문가3호
            'sns' => '인스타그램',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(3)->experts()->create([//B-boying 전문가4호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 1,
        ]);

        App\Specialty::find(4)->experts()->create([//hiphop 전문가1호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);

        App\Specialty::find(4)->experts()->create([//hiphop 전문가2호
            'sns' => '인스타그램',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);

        App\Specialty::find(4)->experts()->create([//hiphop 전문가3호
            'sns' => '인스타그램',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);

        App\Specialty::find(4)->experts()->create([//hiphop 전문가4호
            'sns' => '페이스북',
            'career_01' => '수상경력 01',
            'career_02' => '수상경력 02',
            'career_03' => '수상경력 03',
            'expert_company_id' => 2,
        ]);
    }
}
