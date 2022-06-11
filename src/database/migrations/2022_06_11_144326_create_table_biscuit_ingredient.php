<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBiscuitIngredient extends Migration
{
    public function up()
    {
        Schema::create('biscuit_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biscuit_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biscuit_ingredient');
    }
}
