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
        Schema::table('job_applications', function (Blueprint $table) {
            // Remove fields that exist
            $table->dropColumn(['salary_range', 'interview_date', 'contact_email', 'contact_phone', 'recruiter_name']);
            
            // Add source field
            $table->enum('source', ['LinkedIn', 'Indeed', 'Glassdoor', 'Email'])->after('application_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Add back removed fields
            $table->string('salary_range')->nullable();
            $table->date('interview_date')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('recruiter_name')->nullable();
            
            // Remove source field
            $table->dropColumn('source');
        });
    }
};
