<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('text')->unique();
            $table->date('date')->nullable(); // Permet à 'date' d'être nullable
            $table->string('horaire')->nullable();
            $table->string('localisation');
            $table->string('adresse')->nullable(); // Rend 'adresse' nullable
            $table->timestamps();
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
