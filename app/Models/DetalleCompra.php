<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    //set both foreign keys
    protected $table = 'detalleCompra';
    protected $foreignKey = ['idProducto','idSucursal'];
//Relaciones con producto
    public function producto()
    {
        return $this->hasMany(producto::class);
    }
//Relaciones con compra
    public function compra()
    {
        return $this->hasMany(compra::class);
    }
}
