<?php

namespace App\Models;

abstract class Privileges {
    const USER = "USER";
    const WRITER = "WRITER";
    const ADMIN= "ADMIN";
    
    private function __construct()
    {
        //On bloque le construct ailleurs
    }
}