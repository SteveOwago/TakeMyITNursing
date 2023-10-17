<?php

namespace Database\Seeders;

use App\Models\OrderSubject;
use Illuminate\Database\Seeder;

class OrderSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderTypes = [
            [
                'name' => 'Psychology',
                'price' => '8.0',
            ],
            [
                'name' => 'Literature',
                'price' => '8.0',
            ],
            [
                'name' => 'Sociology',
                'price' => '8.1',
            ],
            [
                'name' => 'Math',
                'price' => '8.1',
            ],
            [
                'name' => 'English',
                'price' => '8.2',
            ],
            [
                'name' => 'Physics',
                'price' => '8.2',
            ],
            [
                'name' => 'Chemistry',
                'price' => '8.8',
            ],
            [
                'name' => 'CPM',
                'price' => '8.0',
            ],
            [
                'name' => 'Statistics',
                'price' => '8.0',
            ],
            [
                'name' => 'Computer Science',
                'price' => '8.0',
            ],
            [
                'name' => 'Programming',
                'price' => '8.0',
            ],
            [
                'name' => 'Accounting',
                'price' => '8.2',
            ],
            [
                'name' => 'History',
                'price' => '8.0',
            ],
            [
                'name' => 'Nursing',
                'price' => '8.0',
            ],
            [
                'name' => 'Sociology',
                'price' => '8.1',
            ],
        ];

        foreach ($orderTypes as $subject) {
            OrderSubject::create($subject);
        }
    }
}
