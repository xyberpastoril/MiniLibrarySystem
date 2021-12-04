<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id');
            $table->integer('user_id');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->date('date_accepted')->nullable();
            $table->date('date_returned')->nullable();
            $table->integer('copies');
            $table->integer('penalty')->nullable();
            $table->enum('status', [
                'pending', // Waiting for Approval 
                'unclaimed', // Approved, but book yet to be claimed
                'claimed', // Approved, and book claimed
                'returned', // Book Returned
                'cancelled', // Transaction Cancelled
            ]);
            $table->timestamps(); // `created_at` as `date_requested`
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
