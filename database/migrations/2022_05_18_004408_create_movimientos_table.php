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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('monto', 10, 2);
            $table->date('fecha');

            /**
             * El campo de imagen guarda el
             * url de la imagen, permite campos nullos
             */
            $table->text('imagen')->nullable();

            /*
             * Ingreso = 1
             * Egreso = 0
             */
            $table->boolean('tipo');
            $table->decimal('saldo');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('etiqueta_id')->nullable();

            $table->foreign('user_id')
                    ->references('id')->on('users');
            $table->foreign('etiqueta_id')
                    ->references('id')->on('etiquetas');
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
        Schema::dropIfExists('movimientos');
    }
};
