<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdenServicio;
use App\Models\MovimientoInventario;
use App\Models\Venta;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
        'telefono',
        'estado'
    ];

    protected $hidden = [
        'password',
    ];

    public function ordenesServicio()
    {
        return $this->hasMany(OrdenServicio::class, 'usuario_id');
    }

    public function movimientosInventario()
    {
        return $this->hasMany(MovimientoInventario::class, 'usuario_id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'usuario_id');
    }
}