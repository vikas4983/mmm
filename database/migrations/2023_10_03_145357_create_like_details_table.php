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
    Schema::create('like_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
        $table->string('hobby')->nullable();  
        $table->string('interest')->nullable(); 
        $table->string('music')->nullable(); 
        $table->string('dress')->nullable(); 
        $table->string('movie')->nullable(); 
        $table->string('sport')->nullable(); 
        $table->integer('status')->default(1);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_details');
    }
};
