<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tests = [
            [
                'id' => 1,
                'name' => 'Teas English Test',
                'subject_category_id' => 1,
                'max_number_of_questions' => 70,
                'test_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Teas Math and Algebra',
                'subject_category_id' => 1,
                'max_number_of_questions' => 70,
                'test_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Introduction to Computer Science',
                'subject_category_id' => 5,
                'max_number_of_questions' => 70,
                'test_duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Test::insert($tests);
    }
}
