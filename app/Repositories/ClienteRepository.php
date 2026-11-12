<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Interfaces\ClienteInterface;

class ClienteRepository extends BaseRepository implements ClienteInterface
{
    public function __construct(Cliente $cliente)
    {
        parent::__construct($cliente);
    }

    public function findByName(string $nombre)
    {
        return $this->model->where('nombre', 'LIKE', '%' . $nombre . '%')->get();
    }

    public function findByDocument(string $documento)
    {
        return $this->model->where('documento', $documento)->first();
    }

    public function findByPhone(string $telefono)
    {
        return $this->model->where('telefono', $telefono)->get();
    }

    public function findByEmail(string $correo)
    {
        return $this->model->where('correo', $correo)->first();
    }
}