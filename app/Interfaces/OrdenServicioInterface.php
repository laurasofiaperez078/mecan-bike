<?php

namespace App\Interfaces;

interface OrdenServicioInterface extends BaseInterface
{
    public function findBySatus(string $estado);
    public function findByDateentry(string $fecha_ingreso);
    public function findByDateDelivery(string $fecha_entrega);

}
?> 