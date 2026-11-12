<?php

namespace App\Interfaces;

interface DetalleServicioInterface extends BaseInterface
{
    public function findByPrice(string $precio);
}
?>