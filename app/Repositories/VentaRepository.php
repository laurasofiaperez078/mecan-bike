<?php

namespace App\Repositories;

use App\Models\Venta;
use App\Interfaces\VentaInterface;

class VentaRepository extends BaseRepository implements VentaInterface
{
    public function __construct(Venta $venta)
    {
        parent::__construct($venta);
    }

    public function findByCliente(int $clienteId)
    {
        return $this->model->where('id_cliente', $clienteId)->get();
    }

    public function findByFecha(string $fecha)
    {
        return $this->model->whereDate('fecha', $fecha)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }
}