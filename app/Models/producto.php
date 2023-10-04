<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    
    protected $primaryKey='idProducto';
    protected $fillable = [
        'nombre',
        'precio',
        'talla',
        'color',
        'categoriaId',
        'idUsuario',
        'idInventario'
    ];
    public function sucursal(){
        return $this->belongsToMany('App\Models\sucursal','detalle_sucursal','idProducto','idSucursal');
    }
}
