<?php

namespace App\Models;

abstract class Status {
    const CREATION = "EN COURS DE CREATION";
    const ACTIF = "ACTIF";
    const BANNI= "BANNI";
    
    private function __construct()
    {
        //On bloque le construct ailleurs
    }
}