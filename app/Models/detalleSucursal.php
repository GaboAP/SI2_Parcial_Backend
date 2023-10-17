<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallesucursal extends Model
{
    use HasFactory;
    //set both primary keys
    protected $primaryKey = ['idProducto','idSucursal'];
    //set both foreign keys
    protected $foreignKey = ['idProducto','idSucursal'];
    public function sucursal(){
        return $this->belongsTo('App\Models\sucursal','idSucursal');
    }
    //set relation with producto
    public function producto(){
        return $this->belongsTo('App\Models\producto','idProducto');
    }
}
