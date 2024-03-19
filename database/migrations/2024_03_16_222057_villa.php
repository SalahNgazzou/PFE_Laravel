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
        Schema::create('Villa', function (Blueprint $table) {
            $table->id('id');
            $table->string('discription');
            $table->string('disponibilté');
            $table->string('categorie');
            $table->string('annonce');
            $table->string('etat');
            $table->string('addresse');
            $table->string('ville');
            $table->string('couvernant');
            $table->double('prix');
            $table->double('surface');
            $table->integer('nbr_chombre');
            $table->integer('nbr_salle_de_bain');
            $table->string('meublé');
            $table->string('jardin');
            $table->string('piscin');
            $table->string('garage');
            $table->string('proximité');
            $table->string('chauffage');
            $table->string('climatisation');
            $table->string('id_user');
            $table->string('user_name');
            $table->string('user_lastName');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('propritair_name');
            $table->string('proritaire_phone');


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
