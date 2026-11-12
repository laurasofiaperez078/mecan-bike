<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleServicio;


class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio'
    ];

    public function detallesServicio()
    {
        return $this->hasMany(DetalleServicio::class, 'servicio_id');
    }

}