<?php

namespace App\Interfaces;

interface ProductoInterface extends BaseInterface
{
    public function findByCode(string $codigo);
    public function findByName(string $nombre);
    public function findByModel(string $modelo);
}
?>
