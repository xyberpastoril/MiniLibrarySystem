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
            'date_accepted' => '2021-12-12',
            'copies' => 1,
            'penalty' => 100,
            'status' => 'unclaimed',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 4,
            'user_id' => 2,
            'date_from' => '2021-11-17',
            'date_to' => '2021-11-19',
            'date_accepted' => '2021-11-16',
            'copies' => 1,
            'penalty' => 100,
            'status' => 'claimed',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 3,
            'user_id' => 3,
            'date_from' => '2021-11-14',
            'date_to' => '2021-11-21',
            'date_accepted' => '2021-11-16',
            'copies' => 2,
            'penalty' => 100,
            'status' => 'claimed',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 3,
            'user_id' => 4,
            'date_from' => '2021-11-19',
            'date_to' => '2021-11-26',
            'date_accepted' => '2021-11-16',
            'copies' => 2,
            'penalty' => 100,
            'status' => 'claimed',
        ]);
        \App\Models\Transaction::create([
            'book_id' => 2,
            'user_id' => 2,
            'date_from' => '2021-11-20',
            'date_to' => '2021-12-11',
            'copies' => 1,
            'status' => 'pending',
        ]);
        \App\Models\Transaction::create([
            'book_id' => 7,
            'user_id' => 2,
            'date_from' => '2021-11-20',
            'date_to' => '2021-12-11',
            'date_accepted' => '2021-11-16',
            'date_returned' => '2021-12-12',
            'copies' => 1,
            'penalty' => 100,
            'status' => 'returned',
        ]);
        //
    }
}
