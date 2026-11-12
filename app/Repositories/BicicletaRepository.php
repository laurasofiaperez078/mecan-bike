<?php

namespace App\Repositories;

use App\Models\Bicicleta;
use App\Interfaces\BicicletaInterface;

class BicicletaRepository extends BaseRepository implements BicicletaInterface
{
    public function __construct(Bicicleta $bicicleta)
    {
        parent::__construct($bicicleta);
    }

    public function findByCliente(int $clienteId)
    {
        return $this->model->where('id_cliente', $clienteId)->get();
    }

    public function findBySerial(string $serial)
    {
        return $this->model->where('serial', $serial)->first();
    }

    public function findByMarca(string $marca)
    {
        return $this->model->where('marca', 'LIKE', '%' . $marca . '%')->get();
    }
}