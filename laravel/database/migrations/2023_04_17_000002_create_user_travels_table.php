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
        Schema::create('user_travels', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('user_id');
            // $table->unsignedInteger('user_dest');
            $table->date('date');
            $table->boolean('active');

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('user_dest')->constrained('travel_destinations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_travels');
    }
};
