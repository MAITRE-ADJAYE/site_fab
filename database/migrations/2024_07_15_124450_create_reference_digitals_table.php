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
        Schema::create('reference_digitals', function (Blueprint $table) {
            $table->id();
            $table->string('photoCaroussel')->unique();
            $table->string('photoCoach')->unique();
            $table->string('nomCoach')->unique();
            $table->string('descriptionCoach')->unique();
            $table->string('texteCoach')->unique();
            $table->string('texteFab')->unique();
            $table->string('video')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_digitals');
    }
};
