<?php

namespace App\Repositories;

use App\Models\RepuestoUsado;
use App\Interfaces\RepuestoUsadoInterface;

class RepuestoUsadoRepository extends BaseRepository implements RepuestoUsadoInterface
{
    public function __construct(RepuestoUsado $repuestoUsado)
    {
        parent::__construct($repuestoUsado);
    }

    public function findByServicio(int $servicioId)
    {
        return $this->model->where('id_servicio', $servicioId)->get();
    }

    public function findByProducto(int $productoId)
    {
        return $this->model->where('id_producto', $productoId)->get();
    }
}