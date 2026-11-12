<?php

namespace App\Interfaces;

interface MovimientoInventarioInterface extends BaseInterface
{
    public function findByDate(string $fecha);
    public function findByType(string $tipo);
    public function findByAmount(string $cantidad);

}
?>