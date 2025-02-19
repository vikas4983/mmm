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
        Schema::create('registration_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('user_status')->default(0);
            $table->tinyInteger('verification_status')->default(0);
            $table->tinyInteger('basic_detail_status')->default(0);
            $table->tinyInteger('horoscope_detail_status')->default(0);
            $table->tinyInteger('carrier_detail_status')->default(0);
            $table->tinyInteger('family_detail_status')->default(0);
            $table->tinyInteger('lifestyle_detail_status')->default(0);
            $table->tinyInteger('like_detail_status')->default(0);
            $table->tinyInteger('contact_detail_status')->default(0);
            $table->tinyInteger('image_status')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_steps');
    }
};
