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
        Schema::create('carrier_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->integer('country');
            $table->integer('state');
            $table->integer('city');
            $table->integer('education');
            $table->string('education_detail')->nullable();
            $table->string('occupation_detail')->nullable();
            $table->integer('employee');
            $table->integer('occupation');
            $table->integer('income');
            $table->string('about_me')->nullable();
            $table->integer('approved_about_me')->default(0);
            $table->string('school_name')->nullable();
            $table->string('college_name')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('interested_abroad')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrier_details');
    }
};
