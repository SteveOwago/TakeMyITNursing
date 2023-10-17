<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
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
                'name' => 'Annotated Bibliographies',
                'rate' => '1.0',
            ],
            [
                'name' => 'Application Essay',
                'rate' => '1.0',
            ],
            [
                'name' => 'Article',
                'rate' => '1.1',
            ],
            [
                'name' => 'Business Plan',
                'rate' => '1.1',
            ],
            [
                'name' => 'Capstone Project',
                'rate' => '1.2',
            ],
            [
                'name' => 'Case Study',
                'rate' => '1.2',
            ],
            [
                'name' => 'Code',
                'rate' => '1.8',
            ],
            [
                'name' => 'Content Writing',
                'rate' => '1.0',
            ],
            [
                'name' => 'Course Work',
                'rate' => '1.0',
            ],
            [
                'name' => 'Creative Writing',
                'rate' => '1.0',
            ],
            [
                'name' => 'Dissertation',
                'rate' => '1.0',
            ],
            [
                'name' => 'Proposal',
                'rate' => '1.2',
            ],
            [
                'name' => 'Editing',
                'rate' => '1.0',
            ],
            [
                'name' => 'Essay',
                'rate' => '1.0',
            ],
            [
                'name' => 'Excel Assignment',
                'rate' => '1.1',
            ],
            [
                'name' => 'Review',
                'rate' => '1.0',
            ],
            [
                'name' => 'Math Solving',
                'rate' => '1.3',
            ],
            [
                'name' => 'Outline',
                'rate' => '1.0',
            ],
            [
                'name' => 'Personal Statement',
                'rate' => '1.0',
            ],
            [
                'name' => 'Presentation',
                'rate' => '1.2',
            ],
            [
                'name' => 'Reflective Writing',
                'rate' => '1.1',
            ],
            [
                'name' => 'Report',
                'rate' => '1.2',
            ],
            [
                'name' => 'Research Paper',
                'rate' => '1.3',
            ],
            [
                'name' => 'Speech',
                'rate' => '1.0',
            ],
            [
                'name' => 'Term Paper',
                'rate' => '1.1',
            ],
            [
                'name' => 'Test',
                'rate' => '1.2',
            ],
            [
                'name' => 'Thesis',
                'rate' => '1.0',
            ],
            [
                'name' => 'Q&A',
                'rate' => '1.0',
            ],
            [
                'name' => 'Other Types',
                'rate' => '1.0',
            ],
            [
                'name' => 'Admission/Scholarship Essay',
                'rate' => '1.2',
            ],
            [
                'name' => 'Argumentative Essay',
                'rate' => '1.0',
            ],
            [
                'name' => 'Article Review',
                'rate' => '1.1',
            ],
            [
                'name' => 'Biography',
                'rate' => '1.1',
            ],
            [
                'name' => 'Copywriting',
                'rate' => '1.0',
            ],
            [
                'name' => 'Cover letter',
                'rate' => '1.4',
            ],
            [
                'name' => 'lab Report',
                'rate' => '1.4',
            ],
        ];

        foreach ($orderTypes as $type) {
            OrderType::create($type);
        }
    }
}
