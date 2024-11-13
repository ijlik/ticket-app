<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'EO']);

        $permissionShow = Permission::create(['name' => 'show events']);
        $permissionCreate = Permission::create(['name' => 'create events']);
        $permissionEdit = Permission::create(['name' => 'edit events']);
        $permissionDelete = Permission::create(['name' => 'delete events']);

        $role->givePermissionTo($permissionShow);
        $role->givePermissionTo($permissionCreate);
        $role->givePermissionTo($permissionEdit);
        $role->givePermissionTo($permissionDelete);
    }
}
