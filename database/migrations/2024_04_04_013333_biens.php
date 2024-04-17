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
        Schema::create("biens", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("type_biens");
            $table->string('description');
            $table->string('disponibilté');
            $table->string('categorie');
            $table->string('annonce')->nullable();
            $table->string('etat');
            $table->string('addresse');
            $table->string('ville');
            $table->string('gouvernant')->nullable();
            $table->integer('prix');
            $table->integer('surface')->nullable();
            $table->integer('nbr_chombre')->nullable();
            $table->integer('nbr_salle_de_bain')->nullable();
            $table->string('meublé')->nullable();
            $table->string('jardin')->nullable();
            $table->string('piscin')->nullable();
            $table->string('garage')->nullable();
            $table->string('balcon')->nullable();
            $table->string('etage')->nullable();
            $table->string('vue')->nullable();
            $table->string('terasse')->nullable();
            $table->string('ascenceur')->nullable();
            $table->string('parking')->nullable();
            $table->string('proximité')->nullable();
            $table->string('chauffage')->nullable();
            $table->string('climatisation')->nullable();
            $table->integer('nbr_place')->nullable();
            $table->string('dimension')->nullable();
            $table->string('secuirité')->nullable();
            $table->string('accessibilité')->nullable();
            $table->string('service')->nullable();
            $table->double('superficie')->nullable();
            $table->string('type_commerce_autorisé')->nullable();
            $table->string('visibilité')->nullable();
            $table->string('usage_autorisé')->nullable();
            $table->string('service_public')->nullable();
            $table->string('cloture')->nullable();
            $table->string('titre_proprité')->nullable();
            $table->integer('nbr_appartement')->nullable();
            $table->integer('nbr_etage')->nullable();
            $table->string('année_construction')->nullable();
            $table->double('superficie_total')->nullable();
            $table->double('superficie_appartement')->nullable();
            $table->string('type_immeuble')->nullable();
            $table->string('espace_commun')->nullable();
            $table->double('superficie_batie')->nullable();
            $table->double('superficie_terre')->nullable();
            $table->string('type_industrie')->nullable();
            $table->string('equipement')->nullable();
            $table->string('acces_tansport')->nullable();
            $table->double('capacité_stockage')->nullable();
            $table->double('heuteur')->nullable();
            $table->string('condition_stockage')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->string('propritair_name');
            $table->string('proritaire_phone');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
