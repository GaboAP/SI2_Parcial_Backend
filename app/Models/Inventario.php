<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $primaryKey='idInventario';
    protected $fillable = [
        'cantidad',
        'idSucursal',
    ];
    //make relation with productos
    public function productos(){
        return $this->hasMany(producto::class,'idInventario');
    }
}
