<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\OrdenServicio;

class Bicicleta extends Model
{
    use HasFactory;

    protected $table = 'bicicletas';

    protected $fillable = [
        'cliente_id',
        'marca',
        'modelo',
        'color',
        'tipo',
        'numero_serie',
        'observaciones'
    ];

   
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

   
    public function ordenesServicio()
    {
        return $this->hasMany(OrdenServicio::class, 'bicicleta_id');
    }
}