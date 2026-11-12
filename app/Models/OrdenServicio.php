<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Bicicleta;
use App\Models\Usuario;
use App\Models\DetalleServicio;
use App\Models\RepuestoUsado;

class OrdenServicio extends Model
{
    use HasFactory;

    protected $table = 'ordenes_servicio';

    protected $fillable = [
        'cliente_id',
        'bicicleta_id',
        'usuario_id',
        'fecha_ingreso',
        'fecha_entrega_estimada',
        'estado',
        'diagnostico',
        'observaciones',
        'costo_total'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function bicicleta()
    {
        return $this->belongsTo(Bicicleta::class, 'bicicleta_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function detallesServicio()
    {
        return $this->hasMany(DetalleServicio::class, 'orden_servicio_id');
    }

    public function repuestosUsados()
    {
        return $this->hasMany(RepuestoUsado::class, 'orden_servicio_id');
    }
}
