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
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('last_name', 150);
            $table->string('email', 100);
            $table->string('image_path', 150); // Ruta de la imagen, no la imagen en sí
            $table->string('cv_path', 150); // Ruta del CV, no el CV en sí
            $table->text('links'); // Si cada miembro puede tener múltiples enlaces
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membres');
    }
};
