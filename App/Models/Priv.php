<?php

namespace App\Models;

abstract class Priv {
    const USER = "USER";
    const WRITER = "WRITER";
    const ADMIN= "ADMIN";
    
    private function __construct()
    {
        //On bloque le construct ailleurs
    }
}