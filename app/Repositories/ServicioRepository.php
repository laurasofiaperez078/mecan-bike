<?php

namespace App\Repositories;

use App\Models\Servicio;
use App\Interfaces\ServicioInterface;

class ServicioRepository extends BaseRepository implements ServicioInterface
{
    public function __construct(Servicio $servicio)
    {
        parent::__construct($servicio);
    }

    public function findByName(string $nombre)
    {
        return $this->model->where('nombre', 'LIKE', '%' . $nombre . '%')->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }
}