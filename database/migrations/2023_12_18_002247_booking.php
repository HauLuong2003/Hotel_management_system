<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->integer('Book_ID');
            $table->integer('Room_ID') ;
            $table->integer('Cus_ID');
            $table->date('Checkin_date');
            $table->date('Checkout_date');   
            $table->float('Price');     

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                Schema::dropIfExists('booking');

    }
};
