<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::create(['name' => 'Librarian']);
        \Spatie\Permission\Models\Role::create(['name' => 'Member']);
        \Spatie\Permission\Models\Role::create(['name' => 'Unverified Member']);
    }
}
