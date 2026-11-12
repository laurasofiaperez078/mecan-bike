<?php

namespace App\Services;

use App\Interfaces\UsuarioInterface;

class UsuarioService
{
    protected UsuarioInterface $usuarioRepository;

    public function __construct(UsuarioInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getAll()
    {
        return $this->usuarioRepository->all();
    }

    public function getById(int $id)
    {
        return $this->usuarioRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->usuarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->usuarioRepository->delete($id);
    }

    public function findByEmail(string $email)
    {
        return $this->usuarioRepository->findByEmail($email);
    }
}