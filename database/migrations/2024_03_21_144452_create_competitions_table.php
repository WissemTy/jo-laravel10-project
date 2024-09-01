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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('sport_id')->constrained();
            $table->foreignId('place_id')->constrained();
            $table->string('type'); // 1er tour ; demi-finale ; finale
            $table->timestamp('timeStart');
            $table->timestamp('timeEnd');
            $table->unsignedInteger('place_restante');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
