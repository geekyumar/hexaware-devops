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
        Schema::create('jobs_list', function(Blueprint $table){
            $table->id();
            $table->string('job_title');
            $table->string('job_description');
            $table->string('department');
            $table->string('job_location');
            $table->string('employment_type');
            $table->string('salary_range');
            $table->date('application_deadline');
            $table->string('required_qualifications');
            $table->string('preferred_qualifications');
            $table->string('responsibilities');
            $table->boolean('is_published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_lists');
    }
};
