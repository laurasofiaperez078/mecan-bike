<?php

namespace App\Services;

use App\Interfaces\ServicioInterface;

class ServicioService
{
    protected ServicioInterface $servicioRepository;

    public function __construct(ServicioInterface $servicioRepository)
    {
        $this->servicioRepository = $servicioRepository;
    }

    public function getAll()
    {
        return $this->servicioRepository->all();
    }

    public function getById(int $id)
    {
        return $this->servicioRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->servicioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->servicioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->servicioRepository->delete($id);
    }

    public function findByEstado(string $estado)
    {
        return $this->servicioRepository->findByEstado($estado);
    }
}