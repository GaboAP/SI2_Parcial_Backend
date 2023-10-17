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
        Schema::create('detalleCompra', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidadCompra');
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idCarrito');


            $table->foreign('idProducto')->references('idProducto')->on('productos')->onDelete('cascade');
            $table->foreign('idCarrito')->references('id')->on('carritos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleCompra');
    }
};
