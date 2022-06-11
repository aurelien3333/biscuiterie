<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('biscuits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('qte');
            $table->float('price_emballage');
            $table->float('pourcentage_energie');
            $table->float('price_vente');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biscuits');
    }
};
