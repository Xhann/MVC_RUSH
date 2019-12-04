<?php

namespace App\Models;

abstract class Group {
    const USER = 0;
    const WRITER = 1;
    const ADMIN= 2;
    
    private function __construct()
    {
        //On bloque le construct ailleurs
    }
}