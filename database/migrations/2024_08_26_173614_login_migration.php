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
        Schema::create('login', function(Blueprint $table){
            $table->integer('id');
            $table->string('username');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('login', function(Blueprint $table){
            $table->dropColumn('id');
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
    }
};
