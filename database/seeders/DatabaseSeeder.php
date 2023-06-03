<?php

namespace Database\Seeders;

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
        $this->call([
            SubjectDomainSeeder::class,
            SubjectCategorySeeder::class,
            TestSeeder::class,
            AnswerChoicesTableSeeder::class,
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,

        ]);
    }
}
