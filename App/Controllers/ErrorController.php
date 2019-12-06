<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Request;


class ErrorController extends AppController
{
  public function display_404(Request $request)
  {
    return $this->render('404.html.twig', ['base' => $request->base,

      'error' => $this->flashError]);
    }
}

