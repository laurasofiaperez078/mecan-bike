<?php

namespace App\Interfaces;

interface ServicioInterface extends BaseInterface
{
    public function findByName(string $nombre);
    public function findByDescription(string $description);
    public function findByPrice(string $precio);
}
?>