<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface 
{
    public function findByName(string $nombre);
    public function findByUser(string $usurio);
    public function findByDocument(string $documento);
    
}
?>