<?php

namespace App\Interfaces;

interface CategoriaInterface extends BaseInterface
{
    public function findByName(string $nombre);
}
?>