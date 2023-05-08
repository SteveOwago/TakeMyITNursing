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
                'created_at' => \Carbon\Carbon::now(),
                'password'=> Hash::make('Owagostv@123'),
            ],
            [
                'id' => 2,
                'name' => 'Admin IMS',
                'email' => 'students@takemyitclass.com',
                'created_at' => \Carbon\Carbon::now(),
                'password'=> Hash::make('Owagostv@123'),
            ],

        ];
        User::insert($users);
        //$users = (array) $users; // Convert Users Object to array using type casting
        //Assign the User Admin Role
        $user = User::findOrFail(1);
        $user->assignRole('Admin');
        $user->syncPermissions(Permission::all());


        $student = User::findOrFail(2);
        $student->assignRole('Student');

        $accountant = User::findOrFail(2);
        $accountant->assignRole('Accountant');
    }
}
