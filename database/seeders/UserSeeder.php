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
            'first_name' => 'Cristobal',
            'last_name' => 'Legaspi',
            'cover_url' => '1',
            'username' => '@cris1412',
            'email' => 'librarian@example.com',
            'gender' => 'Male',
            'address' => 'Visca Baybay City Leyte',
            'password' => \Illuminate\Support\Facades\Hash::make('librarian123'),
        ]);
        $user->assignRole([1]);

        // Create Test Member Account
        $user = \App\Models\User::create([
            'first_name' => 'Raymon',
            'last_name' => 'Magno',
            'cover_url' => '2',
            'username' => 'raymon123',
            'email' => 'member@example.com',
            'gender' => 'Male',
            'address' => 'Visca Baybay City Leyte',
            'password' => \Illuminate\Support\Facades\Hash::make('member123'),
        ]);
        $user->assignRole([2]);

        // Create Test Member Account
        $user = \App\Models\User::create([
            'first_name' => 'Chrisanna Megan',
            'last_name' => 'Dimaculangan',
            'cover_url' => '3',
            'username' => 'megan143',
            'email' => 'member2@example.com',
            'gender' => 'Female',
            'address' => 'Visca Baybay City Leyte',
            'password' => \Illuminate\Support\Facades\Hash::make('member123'),
        ]);
        $user->assignRole([2]);

        // Create Test Member Account
        $user = \App\Models\User::create([
            'first_name' => 'Kelsey',
            'last_name' => 'Cembrano',
            'cover_url' => '4',
            'username' => 'kelcembrano',
            'email' => 'member3@example.com',
            'gender' => 'Female',
            'address' => 'Visca Baybay City Leyte',
            'password' => \Illuminate\Support\Facades\Hash::make('member123'),
        ]);
        $user->assignRole([2]);
    }
}
