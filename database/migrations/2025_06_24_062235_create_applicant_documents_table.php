<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicant_documents', function (Blueprint $table) {
            $table->id();
            // Document Upload Fields
            $table->string('see_gradesheet')->nullable();
            $table->string('community_school_document')->nullable();
            $table->string('citizenship_birth_certificate')->nullable();
            $table->string('disability_id_card')->nullable();
            $table->string('dalit_janjati_recommendation')->nullable();
            $table->string('bipanna_recommendation')->nullable();
            $table->string('physical_disability_certificate')->nullable();
            $table->string('movement_related_certificate')->nullable();
            $table->string('passport_size_photo')->nullable();
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
        Schema::dropIfExists('applicant_documents');
    }
};
