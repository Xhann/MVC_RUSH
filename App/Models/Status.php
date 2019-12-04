<?php

namespace App\Models;

abstract class Status {
    const CREATION = 0;
    const ACTIF = 1;
    const BANNI= 2;
    
    private function __construct()
    {
        //On bloque le construct ailleurs
    }
}