<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio_compra',
        'precio_venta',
        'stock',
        'descripcion',
        'fecha_creacion',
    ];

    public function ventas()
    {
        return $this->hasMany(Ventas::class);
    }
    
    public function restarStock($cantidad)
    {
        $nuevoStock = $this->stock - $cantidad;
        if ($nuevoStock < 0) {
            throw new \Exception('Stock insuficiente');
        }

        $this->update(['stock' => $nuevoStock]);
    }
}
