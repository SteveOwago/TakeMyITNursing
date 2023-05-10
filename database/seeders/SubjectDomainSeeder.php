<?php

namespace Database\Seeders;

use App\Models\SubjectDomain;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubjectDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjectDomains = [
            [
                'id' => '1',
                'name' => 'Medical Courses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '2',
                'name' => 'IT & Programming Courses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        SubjectDomain::insert($subjectDomains);
    }
}
