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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
            $table->foreignId('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->string('customer_name', 100);
            $table->string('seat_number', 5);
            $table->boolean('is_checked_in')->default(0);
            $table->dateTime('check_in_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
