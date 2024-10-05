<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id(); // Esta es la clave primaria y auto_increment
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('provedor_id');
            $table->integer('cantidad')->notNull();
            $table->unsignedInteger('valor_unidad'); // No debe tener auto_increment
            $table->decimal('precio_compra', 8, 2)->notNull();
            $table->date('fecha_compra')->notNull();
            $table->string('soporte_compra', 255)->notNull();
            $table->timestamps();

            // Añadir las claves foráneas si es necesario
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('provedor_id')->references('id')->on('provedores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}