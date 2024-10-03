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
        Schema::create('job_applications', function(Blueprint $table){
            $table->id();
            $table->integer('job_id');
            $table->string('applicant_name');
            $table->string('email');
            $table->string('phone');
            $table->string('resume');
            $table->string('application_status');
            $table->string('notes');
            $table->boolean('is_hired');
            $table->boolean('is_rejected');
            $table->string('source');
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
