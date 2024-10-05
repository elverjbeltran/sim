<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto_id',
        'provedor_id',
        'cantidad',
        'valor_unidad',
        'precio_compra',
        'fecha_compra',
        'soporte_compra',
    ];

    public static function boot()
    {
        parent::boot();

        // Actualizar stock cuando se crea una compra
        static::created(function ($compra) {
            $producto = $compra->producto;
            $producto->stock += $compra->cantidad;
            $producto->save();
        });
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class);
    }

    public function provedor()
    {
        return $this->belongsTo(Provedores::class);
    }
}
