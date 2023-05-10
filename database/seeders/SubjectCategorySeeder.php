<?php

namespace Database\Seeders;

use App\Models\SubjectCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjectCats = [
            [
                'id' => '1',
                'name' => 'Pre-Medical Courses',
                'subject_domain_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '2',
                'name' => 'Medical School Courses',
                'subject_domain_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '3',
                'name' => 'Residency and Fellowship Courses',
                'subject_domain_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        SubjectCategory::insert($subjectCats);
    }
}
