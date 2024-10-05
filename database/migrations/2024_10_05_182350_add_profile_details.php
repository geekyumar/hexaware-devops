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
        Schema::table('users', function(Blueprint $table){
            $table->string('role')->nullable();
            $table->string('about')->nullable();
            $table->string('skills')->nullable();
            $table->string('education_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('role');
            $table->dropColumn('about');
            $table->dropColumn('skills');
            $table->dropColumn('education_details');
        });
    }
};
