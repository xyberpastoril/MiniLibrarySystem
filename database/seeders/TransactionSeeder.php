<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Transaction::create([
            'book_id' => 1,
            'user_id' => 2,
            'date_from' => '2021-11-20',
            'date_to' => '2021-12-11',
            'status' => 'unclaimed',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 4,
            'user_id' => 2,
            'date_from' => '2021-11-17',
            'date_to' => '2021-11-19',
            'status' => 'claimed',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 3,
            'user_id' => 3,
            'date_from' => '2021-11-14',
            'date_to' => '2021-11-21',
            'status' => 'claimed',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 3,
            'user_id' => 4,
            'date_from' => '2021-11-19',
            'date_to' => '2021-11-26',
            'status' => 'claimed',
        ]);
        \App\Models\Transaction::create([
            'book_id' => 2,
            'user_id' => 2,
            'status' => 'pending',
        ]);
        \App\Models\Transaction::create([
            'book_id' => 7,
            'user_id' => 2,
            'status' => 'returned',
        ]);
        //
    }
}
