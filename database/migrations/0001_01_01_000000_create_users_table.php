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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ne')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            // $table->string('address')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->default(2)->comment('0=superadmin, 1=admin, 2=user');
            $table->boolean('is_active')->default(1)->comment('1=active, 0=inactive');
            $table->string('school_name')->nullable();
            $table->enum('scholarship_group', [
                'madhesi',
                'vepata',
                'jehendar',
                'bipanna',
                'janjati',
                'apanga',
                'shahid',
                'dalit'
            ])->nullable();
            $table->string('dob_bs')->nullable(); // in BS (text as BS format is non-standard)
            $table->date('dob_ad')->nullable();  // in AD (proper date format)
            $table->tinyInteger('gender')->nullable()->comment('0=male, 1=female, 2=other');
            
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('grandfather_occupation')->nullable();
            $table->string('family_income_source')->nullable();
            $table->string('family_income_amount')->nullable();

            $table->string('see_school_type')->nullable();          // सार्वजनिक/संस्थागत
            $table->string('desired_stream')->nullable();           // कक्षा ११ मा पढ्ने चाहेको विषय
            $table->string('see_symbol_number')->nullable();        // SEE सिट नम्बर
            $table->string('see_gpa')->nullable();                  // SEE GPA
            $table->text('see_school_address')->nullable();         // SEE विद्यालयको ठेगाना


            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
