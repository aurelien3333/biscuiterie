<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('fournisseur_id')->index();
            $table->string('description')->nullable();
            $table->string('unite');
            $table->float('cdt');
            $table->float('price_ht');
            $table->float('tva');
            $table->string('url')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
};
