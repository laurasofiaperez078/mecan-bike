<?php

namespace App\Repositories;

use App\Models\OrdenServicio;
use App\Interfaces\OrdenServicioInterface;

class OrdenServicioRepository extends BaseRepository implements OrdenServicioInterface
{
    public function __construct(OrdenServicio $ordenServicio)
    {
        parent::__construct($ordenServicio);
    }

    public function findByCliente(int $clienteId)
    {
        return $this->model->where('id_cliente', $clienteId)->get();
    }

    public function findByBicicleta(int $bicicletaId)
    {
        return $this->model->where('id_bicicleta', $bicicletaId)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }
}