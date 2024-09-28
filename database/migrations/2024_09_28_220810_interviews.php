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
        Schema::create('interviews', function(Blueprint $table){
            $table->id();
            $table->string('applicant_id');
            $table->string('job_id');
            $table->date('interview_date');
            $table->string('interview_time');
            $table->string('interviewers');
            $table->string('interview_mode');
            $table->string('interview_location')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
