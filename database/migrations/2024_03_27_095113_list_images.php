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
        
            Schema::create('list_images', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_bien');
                $table->string('src');
                $table->timestamps();
    
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
