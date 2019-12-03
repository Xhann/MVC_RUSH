<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

// require_once("../../config/db.php");

class ErrorController extends AppController
{
    public function display_404(Request $request)
    {
      // $config = getConfigDb();
      // var_dump($config);
      return $this->render('404.html.twig', ['base' => $request->route,
      'error' => $this->flashError]);
    }
}