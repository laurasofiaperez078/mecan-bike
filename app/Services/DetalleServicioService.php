<?php

namespace App\Services;

use App\Interfaces\DetalleServicioInterface;

class DetalleServicioService
{
    protected DetalleServicioInterface $detalleServicioRepository;

    public function __construct(DetalleServicioInterface $detalleServicioRepository)
    {
        $this->detalleServicioRepository = $detalleServicioRepository;
    }

    public function getAll()
    {
        return $this->detalleServicioRepository->all();
    }

    public function getById(int $id)
    {
        return $this->detalleServicioRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->detalleServicioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->detalleServicioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->detalleServicioRepository->delete($id);
    }

    public function findByOrdenServicio(int $ordenServicioId)
    {
        return $this->detalleServicioRepository->findByOrdenServicio($ordenServicioId);
    }

    public function findByServicio(int $servicioId)
    {
        return $this->detalleServicioRepository->findByServicio($servicioId);
    }
}