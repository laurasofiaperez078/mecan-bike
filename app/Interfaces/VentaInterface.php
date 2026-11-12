<?php

namespace App\Interfaces;

interface VentaInterface extends BaseInterface 
{
    public function findByDate(string $fecha);
    public function findByTotal(string $total);

}
?> 