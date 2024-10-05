<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedores extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombrep',
        'nit',
        'mail',
        'tel',
    ];

    public function compras()
    {
        return $this->hasMany(Compras::class);
    }
}
