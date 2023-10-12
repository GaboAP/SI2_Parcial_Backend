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
    public function inventario(){
        return $this->hasOne('App\Models\inventario','idInventario');
    }
    public function categoria(){
        return $this->belongsTo('App\Models\categoria','categoriaId');
    }
    //create method for user
    public function user(){
        return $this->hasOne('App\Models\User','idUsuario');
    }
}
