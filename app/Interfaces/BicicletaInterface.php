<?php

namespace App\Interfaces; 

interface BicicletaInterface extends BaseInterface
{
    public function findByType(string $tipo);
    public function findByModel(string $modelo);
    public function findByColor(string $color);
}
?>