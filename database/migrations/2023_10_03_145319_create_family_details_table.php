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
        Schema::create('family_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->integer('father_occupation')->nullable();
            $table->integer('mother_occupation')->nullable();
            $table->string('brother')->nullable();
            $table->string('brother_married')->nullable();
            $table->string('sister')->nullable();
            $table->string('sister_married')->nullable();
            $table->integer('family_living')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('about_family')->nullable();
            $table->string('approved_about_family')->default(0);
            $table->string('father_gotra')->nullable();
            $table->string('mother_gotra')->nullable();
            $table->integer('family_type')->nullable();
            $table->integer('family_value')->nullable();
            $table->integer('family_status')->nullable();
            $table->string('native_place')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_details');
    }
};
