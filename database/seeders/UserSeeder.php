<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Librarian Account
        $user = \App\Models\User::create([
            'first_name' => 'Test',
            'last_name' => 'Librarian',
            'username' => 'librarian',
            'email' => 'librarian@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('librarian123'),
        ]);
        $user->assignRole([1]);

        // Create Test Member Account
        $user = \App\Models\User::create([
            'first_name' => 'Test',
            'last_name' => 'Member',
            'username' => 'member',
            'email' => 'member@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('member123'),
        ]);
        $user->assignRole([2]);

        // Create Test Member Account
        $user = \App\Models\User::create([
            'first_name' => 'Test',
            'last_name' => 'Member 2',
            'username' => 'member2',
            'email' => 'member2@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('member123'),
        ]);
        $user->assignRole([2]);

        // Create Test Member Account
        $user = \App\Models\User::create([
            'first_name' => 'Test',
            'last_name' => 'Member 3',
            'username' => 'member3',
            'email' => 'member3@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('member123'),
        ]);
        $user->assignRole([2]);
    }
}
