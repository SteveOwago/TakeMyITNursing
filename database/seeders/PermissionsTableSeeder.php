<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'admin_management']);
        Permission::create(['name' => 'transactions_management']);
        Permission::create(['name' => 'has_student_permissions']);
        Permission::create(['name' => 'users_management']);

        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleStudent = Role::create(['name' => 'Student']);
        $roleAccountant = Role::create(['name' => 'Accountant']);

        $roleAdmin->givePermissionTo(Permission::all());
        $roleAccountant->givePermissionTo(['transactions_management']);
        $roleStudent->givePermissionTo(['has_student_permissions']);
    }
}

