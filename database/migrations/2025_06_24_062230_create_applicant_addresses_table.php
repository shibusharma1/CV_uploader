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
        Schema::create('applicant_addresses', function (Blueprint $table) {
            $table->id();
    
            $table->string('permanent_province')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_municipality')->nullable();
            $table->string('permanent_ward')->nullable();

            $table->string('temporary_province')->nullable();
            $table->string('temporary_district')->nullable();
            $table->string('temporary_municipality')->nullable();
            $table->string('temporary_ward')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_addresses');
    }
};
