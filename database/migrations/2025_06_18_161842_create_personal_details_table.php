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
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
                        $table->string('father_name')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('languages_known')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('career_objective')->nullable();
            $table->string('education')->nullable();
            $table->string('skills')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('certifications')->nullable();
            $table->string('projects')->nullable();
            $table->string('references')->nullable();
            $table->string('image')->nullable();
            $table->string('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
