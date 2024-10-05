<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = [
        'cedula',
        'nombre',
        'email',
        'tel'
    ];

    public function ventas()
    {
        return $this->hasMany(Ventas::class);
    }
}
