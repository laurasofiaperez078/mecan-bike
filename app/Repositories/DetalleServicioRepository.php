<?php

namespace App\Repositories;

use App\Models\DetalleServicio;
use App\Interfaces\DetalleServicioInterface;

class DetalleServicioRepository extends BaseRepository implements DetalleServicioInterface
{
    public function __construct(DetalleServicio $detalleServicio)
    {
        parent::__construct($detalleServicio);
    }

    public function findByServicio(int $servicioId)
    {
        return $this->model->where('servicio_id', $servicioId)->get();
    }
}