<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdenServicio;
use App\Models\Servicio;

class DetalleServicio extends Model
{
    use HasFactory;

    protected $table = 'detalles_servicio';

    protected $fillable = [
        'orden_servicio_id',
        'servicio_id',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function ordenServicio()
    {
        return $this->belongsTo(OrdenServicio::class, 'orden_servicio_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}