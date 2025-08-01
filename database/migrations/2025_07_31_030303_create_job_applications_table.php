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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('position_title');
            $table->text('job_description')->nullable();
            $table->string('location')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('application_url')->nullable();
            $table->enum('status', ['applied', 'phone_screen', 'interview', 'technical_test', 'final_interview', 'offer', 'rejected', 'withdrawn'])->default('applied');
            $table->date('applied_date');
            $table->date('interview_date')->nullable();
            $table->text('notes')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('recruiter_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
