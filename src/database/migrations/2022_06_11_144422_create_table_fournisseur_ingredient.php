<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFournisseurIngredient extends Migration
{
    public function up()
    {
        Schema::create('fournisseur_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fournisseur_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fournisseur_ingredient');
    }
}
