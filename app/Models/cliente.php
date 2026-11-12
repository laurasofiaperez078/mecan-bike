<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bicicleta;
use App\Models\Venta;
use App\Models\OrdenServicio;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'documento',
        'telefono',
        'email',
        'direccion'
    ];

 
    public function bicicletas()
    {
        return $this->hasMany(Bicicleta::class, 'cliente_id');
    }

  
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'cliente_id');
    }

    public function ordenesServicio()
    {
        return $this->hasMany(OrdenServicio::class, 'cliente_id');
    }
}