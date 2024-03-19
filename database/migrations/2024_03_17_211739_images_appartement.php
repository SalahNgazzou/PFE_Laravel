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
        Schema::create('Images_appartement', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_bien'); // Clé étrangère
        
            // Déclaration de la colonne 'src'
            $table->string('src');
        
            // Déclaration de la clé étrangère
            $table->foreign('id_bien')->references('id')->on('appartement')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
