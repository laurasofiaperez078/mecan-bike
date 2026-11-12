<?php

namespace App\Repositories;

use App\Models\MovimientoInventario;
use App\Interfaces\MovimientoInventarioInterface;

class MovimientoInventarioRepository extends BaseRepository implements MovimientoInventarioInterface
{
    public function __construct(MovimientoInventario $movimientoInventario)
    {
        parent::__construct($movimientoInventario);
    }

    public function findByProducto(int $productoId)
    {
        return $this->model->where('id_producto', $productoId)->get();
    }

    public function findByTipo(string $tipo)
    {
        return $this->model->where('tipo', $tipo)->get();
    }

    public function findByFecha(string $fecha)
    {
        return $this->model->whereDate('fecha', $fecha)->get();
    }
}