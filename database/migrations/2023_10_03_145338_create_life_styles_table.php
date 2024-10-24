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
        Schema::create('life_styles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->integer('body_type');
            $table->integer('complexion');
            $table->integer('dietary_habit');
            $table->integer('drinking_habit');
            $table->integer('smoking_habit');
            $table->integer('physical_status');
            $table->integer('weight')->nullable();
            $table->integer('blood_group')->nullable();
            $table->string('open_to_pet')->nullable();
            $table->string('own_house')->nullable();
            $table->string('own_car')->nullable();
            $table->integer('language_speak')->nullable();
            $table->string('hiv')->nullable();
            $table->string('thalassemia')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('life_styles');
    }
};
