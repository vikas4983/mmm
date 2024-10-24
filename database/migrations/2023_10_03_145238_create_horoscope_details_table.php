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
        Schema::create('horoscope_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('time_of_birth')->nullable();
            $table->string('manglik')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('rashi')->nullable();
            $table->string('horoscope_match')->nullable();
            $table->string('horoscope_show')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horoscope_details');
    }
};
