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
            'date_from' => '2021-12-15',
            'date_to' => '2021-12-22',
            'copies' => 1,
            'penalty' => 100,
            'status' => 'pending',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 4,
            'user_id' => 2,
            'date_from' => '2021-12-14',
            'date_to' => '2021-12-20',
            'date_accepted' => '2021-11-14',
            'copies' => 1,
            'penalty' => 100,
            'status' => 'unclaimed',
        ]);

        \App\Models\Transaction::create([
            'book_id' => 3,
            'user_id' => 3,
            'date_from' => '2021-12-14',
            'date_to' => '2021-12-21',
            'date_accepted' => '2021-12-14',
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
            'copies' => 1,
            'penalty' => 100,
            'status' => 'claimed',
        ]);
        \App\Models\Transaction::create([
            'book_id' => 2,
            'user_id' => 2,
            'date_from' => '2021-12-05',
            'date_to' => '2021-12-15',
            'date_accepted' => '2021-12-04',
            'copies' => 1,
            'status' => 'claimed',
        ]);
        \App\Models\Transaction::create([
            'book_id' => 7,
            'user_id' => 2,
            'date_from' => '2021-12-01',
            'date_to' => '2021-12-07',
            'date_accepted' => '2021-12-01',
            'date_returned' => '2021-12-07',
            'copies' => 1,
            'penalty' => 100,
            'status' => 'returned',
        ]);
        //
    }
}
