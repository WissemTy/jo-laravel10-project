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
        Schema::create('spectators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstName');
            $table->integer('phoneNumber');
            $table->string('email');
            $table->foreignId('competitions_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spectators');
    }
};
