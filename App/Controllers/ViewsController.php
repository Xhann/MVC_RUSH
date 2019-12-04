<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class ViewsController extends AppController
{

  public function index(Request $request)
  {
    return $this->render('index.html.twig', ['base' => $request->base,
      'error' => $this->flashError]);
  }

  public function login(Request $request)
  {
    return $this->render('login.html.twig', ['base' => $request->base,
      'error' => $this->flashError]);
  }

}