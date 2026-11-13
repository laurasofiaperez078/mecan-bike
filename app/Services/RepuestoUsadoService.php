<?php

namespace App\Services;

use App\Interfaces\RepuestoUsadoInterface;

class RepuestoUsadoService
{
    protected RepuestoUsadoInterface $repuestoUsadoRepository;

    public function __construct(RepuestoUsadoInterface $repuestoUsadoRepository)
    {
        $this->repuestoUsadoRepository = $repuestoUsadoRepository;
    }

    public function getAll()
    {
        return $this->repuestoUsadoRepository->all();
    }

    public function getById(int $id)
    {
        return $this->repuestoUsadoRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->repuestoUsadoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repuestoUsadoRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repuestoUsadoRepository->delete($id);
    }

    public function findByOrdenServicio(int $ordenServicioId)
    {
        return $this->repuestoUsadoRepository->findByOrdenServicio($ordenServicioId);
    }
}