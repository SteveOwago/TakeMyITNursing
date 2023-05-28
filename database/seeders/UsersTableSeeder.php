<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin IMS',
                'email' => 'steveowago@gmail.com',
                'subject_domain_id'=>null,
                'created_at' => \Carbon\Carbon::now(),
                'password'=> Hash::make('Owagostv@123'),
            ],
            [
                'id' => 2,
                'name' => 'Student TakeMyIT',
                'email' => 'students@takemyitclass.com',
                'subject_domain_id'=>1,
                'created_at' => \Carbon\Carbon::now(),
                'password'=> Hash::make('student@123'),
            ],
            [
                'id' => 3,
                'name' => 'Student TakeMyIT',
                'email' => 'students1@takemyitclass.com',
                'subject_domain_id'=>2,
                'created_at' => \Carbon\Carbon::now(),
                'password'=> Hash::make('student@123'),
            ],
            [
                'id' => 4,
                'name' => 'Accountant TakeMyIT',
                'email' => 'accounts@takemyitclass.com',
                'subject_domain_id'=>null,
                'created_at' => \Carbon\Carbon::now(),
                'password'=> Hash::make('accounts@123'),
            ],

        ];
        User::insert($users);
        //$users = (array) $users; // Convert Users Object to array using type casting
        //Assign the User Admin Role
        $user = User::findOrFail(1);
        $user->assignRole('Admin');
        $user->syncPermissions(Permission::all());

        //Asign User Student Role
        $student = User::findOrFail(2);
        $student->assignRole('Student');

        //Assign the User Accountant Role
        $accountant = User::findOrFail(3);
        $accountant->assignRole('Accountant');
    }
}
