<?php

namespace App\Interfaces;

interface ClienteInterface extends BaseInterface
{
    public function findByName(string $nombre);
    public function findByDocument(string $documento);
    public function findByPhone(string $telefono);
}

?>