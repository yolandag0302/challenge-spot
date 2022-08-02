<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catastros', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_postal');
            $table->string('uso_construccion');
            $table->float('superficie_terreno');
            $table->float('superficie_construccion');
            $table->float('valor_suelo');
            $table->float('subsidio');
            $table->float('price_unit');
            $table->float('price_unit_construction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catastros');
    }
};
