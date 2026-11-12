<?php

namespace App\Interfaces;

interface DetalleVentaInterface extends BaseInterface 
{
    public function findByAmount(string $cantidad);
    public function findByPrice(string $precio);
}
?>