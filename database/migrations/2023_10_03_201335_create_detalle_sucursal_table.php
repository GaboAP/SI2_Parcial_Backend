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
        Schema::create('detalle_sucursal', function (Blueprint $table) {
            $table->unsignedBigInteger('idSucursal');
            $table->unsignedBigInteger('idProducto');

            $table->primary(['idSucursal', 'idProducto']);

            $table->foreign('idSucursal')->references('idSucursal')->on('sucursal')->onDelete('cascade');
            $table->foreign('idProducto')->references('idProducto')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleSucursal');
    }
};
