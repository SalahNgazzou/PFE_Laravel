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
        Schema::create('commentairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bien');
            $table->string('nom_prenom')->nullable();
            $table->string('telephone')->nullable();
            $table->string('id_user');
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->string('etat');
            $table->timestamps();

            // Clé étrangère
            $table->foreign('id_bien')->references('id')->on('biens')->onDelete('cascade');
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
