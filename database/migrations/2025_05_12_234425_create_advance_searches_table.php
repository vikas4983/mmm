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
        Schema::create('advance_searches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            $table->integer('min_height')->nullable(); 
            $table->integer('max_height')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('children')->nullable(); 
            $table->string('mother_tongue')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('income')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('profile_show')->nullable(); 
            $table->string('horoscope')->nullable(); 
            $table->string('manglik')->nullable(); 
            $table->string('family_status')->nullable();
            $table->string('physical_status')->nullable();
            $table->string('diet')->nullable();
            $table->string('drink')->nullable();
            $table->string('smoke')->nullable();
            $table->string('hiv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advance_searches');
    }
};
