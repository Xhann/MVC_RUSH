<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;
use WebFramework\ORM;

class ErrorController extends AppController
{
  public function display_404(Request $request)
  {
    //$orm=getInstance();

    //var_dump($orm->db);
    return $this->render('404.html.twig', ['base' => $request->base,
      'error' => $this->flashError]);
  }

 
  
}
