<?php

namespace App\Repositories;

use App\Models\DetalleVenta;
use App\Interfaces\DetalleVentaInterface;

class DetalleVentaRepository extends BaseRepository implements DetalleVentaInterface
{
    public function __construct(DetalleVenta $detalleVenta)
    {
        parent::__construct($detalleVenta);
    }

    public function findByVenta(int $ventaId)
    {
        return $this->model->where('id_venta', $ventaId)->get();
    }

    public function findByProducto(int $productoId)
    {
        return $this->model->where('id_producto', $productoId)->get();
    }
}