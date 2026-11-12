<?php

namespace App\Repositories;

use App\Models\Producto;
use App\Interfaces\ProductoInterface;

class ProductoRepository extends BaseRepository implements ProductoInterface
{
    public function __construct(Producto $producto)
    {
        parent::__construct($producto);
    }

    public function findByCode(string $codigo)
    {
        return $this->model->where('codigo', $codigo)->first();
    }

    public function findByName(string $nombre)
    {
        return $this->model->where('nombre', 'LIKE', '%' . $nombre . '%')->get();
    }

    public function findByBrand(string $marca)
    {
        return $this->model->where('marca', 'LIKE', '%' . $marca . '%')->get();
    }

    public function findByCategory(int $categoriaId)
    {
        return $this->model->where('id_categoria', $categoriaId)->get();
    }

    public function getLowStock()
    {
        return $this->model->whereColumn('stock_actual', '<=', 'stock_minimo')->get();
    }
}