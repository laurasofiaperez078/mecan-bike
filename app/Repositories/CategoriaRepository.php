<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Interfaces\CategoriaInterface;

class CategoriaRepository extends BaseRepository implements CategoriaInterface
{
    public function __construct(Categoria $categoria)
    {
        parent::__construct($categoria);
    }

    public function findByName(string $nombre)
    {
        return $this->model->where('nombre', 'LIKE', '%' . $nombre . '%')->get();
    }
}