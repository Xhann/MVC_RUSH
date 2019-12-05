<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

class AdminController extends AppController
{

    public function admin_view(Request $request)
    {
        return $this->render('admin_dashboard.html.twig', ['base' => $request->route,
      'error' => $this->flashError]);
    }
}