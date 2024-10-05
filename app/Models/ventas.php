<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto_id',
        'cliente_id',
        'cantidad',
        'precio_venta',
        'fecha_venta',
    ];
    public static function boot()
    {
        parent::boot();

        // Actualizar stock cuando se crea una venta
        static::created(function ($venta) {
            $producto = $venta->producto;
            $producto->stock -= $venta->cantidad;

            // Verifica que el stock no sea negativo
            if ($producto->stock < 0) {
                throw new \Exception("El stock del producto no puede ser negativo.");
            }

            $producto->save();
        });
    }
    public function producto()
    {
        return $this->belongsTo(Productos::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }
}
