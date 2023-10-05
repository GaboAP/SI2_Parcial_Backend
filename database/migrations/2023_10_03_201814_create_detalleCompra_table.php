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
            $table->integer('cantidad');
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idCompra');

            $table->primary(['idProducto', 'idCompra']);

            $table->foreign('idProducto')->references('idProducto')->on('productos')->onDelete('cascade');
            $table->foreign('idCompra')->references('idCompra')->on('compra')->onDelete('cascade');
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
