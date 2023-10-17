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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('nombre');
            $table->string('talla');
            $table->string('color');
            $table->string('foto');
            $table->decimal('precio', 8, 2);
            $table->integer('cantidad');
            $table->unsignedBigInteger('categoriaId');
            $table->unsignedBigInteger('idUsuario');
            
            $table->foreign('categoriaId')->references('categoriaId')->on('categorias');
            $table->foreign('idUsuario')->references('idUsuario')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
