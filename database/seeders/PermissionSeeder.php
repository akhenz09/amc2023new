<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Admin']);
        Permission::create(['name' => 'Create user']);
        Permission::create(['name' => 'Edit user']);
        Permission::create(['name' => 'Delete user']);
        Permission::create(['name' => 'Landing Page Content']);
        Permission::create(['name' => 'Dashboard Content']);
    }
}
