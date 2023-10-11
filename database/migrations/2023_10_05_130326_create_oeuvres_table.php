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
        Schema::create('oeuvres', function (Blueprint $table) {
            $table->id('idOeuvre');
            $table->string('nom');
            $table->string('description');
            $table->string('annee');
            $table->unsignedBigInteger('idArtistes');
            $table->unsignedBigInteger('idCategorie');
            $table->timestamps();
            $table->foreign('idArtistes')->references('idArtistes')->on('artiste');
            $table->foreign('idCategorie')->references('idCategorie')->on('Categorie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oeuvres');
    }
};
