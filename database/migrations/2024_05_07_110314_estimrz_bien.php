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
        Schema::create('estimation_biens', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('type');
            $table->string('categorie');
            $table->string('adresse');
            $table->string('message')->nullable();
            $table->string('etat');
            $table->timestamps();
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
