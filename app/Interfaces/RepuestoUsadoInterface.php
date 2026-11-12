<?php

namespace App\Interfaces;

interface RepuestoUsadoInterface extends BaseInterface 
{
    public function findByAmount(string $cantidad);
    public function findByPrice(string $precio);
}
?>