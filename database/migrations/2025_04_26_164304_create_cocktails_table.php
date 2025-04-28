<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cocktails', function (Blueprint $table) {
            $table->id();
            $table->string('name');        // Nombre del cóctel
            $table->string('category')->nullable(); // Categoría (puede ser nula)
            $table->string('alcoholic')->nullable(); // Si es alcohólico o no
            $table->string('thumb')->nullable(); // Imagen del cóctel
            $table->timestamps();           // created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cocktails');
    }
};
