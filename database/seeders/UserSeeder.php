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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'first_name' => 'Test',
                'last_name' => 'Librarian',
                'email' => 'librarian@example.com',
                'password' => \Illuminate\Support\Facades\Hash::make('librarian123'),
            ],
            [
                'first_name' => 'Test',
                'last_name' => 'Member',
                'email' => 'member@example.com',
                'password' => \Illuminate\Support\Facades\Hash::make('member123'),
            ]
        ]);
    }
}
