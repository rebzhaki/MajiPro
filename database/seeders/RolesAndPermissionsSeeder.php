<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // create permissions
        Permission::create(['name' => 'Consumption']);
        Permission::create(['name' => 'Bills']);
        Permission::create(['name' => 'Payments']);
        Permission::create(['name' => 'Tarrifs']);
        Permission::create(['name' => 'Customers']);
        Permission::create(['name' => 'Users']);
        Permission::create(['name' => 'Communication']);
        Permission::create(['name' => 'Delete']);
        
        // create Roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Finance']);
        Role::create(['name' => 'Field officer']);
        Role::create(['name' => 'Office staff']);
    }
}
