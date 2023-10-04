<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    use HasFactory;
    protected $primaryKey='idSucursal';
    protected $fillable = [
        'direccion',
        'ciudad',
    ];
    //create productos() method to relate with producto model in many to many relationship
    public function productos(){
        return $this->belongsToMany('App\Models\producto','detalle_sucursal','idSucursal','idProducto');
    }
}
