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
        //
        Schema::create('customer', function (Blueprint $table) {
            $table->integer('Cus_ID');
            $table->string('Cus_Name');
            $table->string('Cus_Phone');
            $table->string('Cus_Email');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');

    }
};
