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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained();
            $table->foreignId('personne_id_1')->constrained('spectators');
            $table->foreignId('personne_id_2')->nullable()->constrained('spectators');
            $table->foreignId('personne_id_3')->nullable()->constrained('spectators');
            $table->foreignId('personne_id_4')->nullable()->constrained('spectators');
            $table->foreignId('personne_id_5')->nullable()->constrained('spectators');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
