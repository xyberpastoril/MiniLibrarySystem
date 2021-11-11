<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Librarian']);

        
        $user = \App\Models\User::where('id', '=', 1)->first();
        $user->assignRole([$role->id]);

        $role = Role::create(['name' => 'Member']);

        $user = \App\Models\User::where('id', '=', 2)->first();
        $user->assignRole([$role->id]);
    }
}
