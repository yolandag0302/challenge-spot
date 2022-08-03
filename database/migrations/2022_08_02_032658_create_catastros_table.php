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
            $table->decimal('superficie_terreno', 18, 2);
            $table->decimal('superficie_construccion', 18, 2);
            $table->decimal('valor_suelo', 18, 2);
            $table->decimal('subsidio', 18, 2);
            $table->decimal('price_unit', 18, 2);
            $table->decimal('price_unit_construction', 18, 2);
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
