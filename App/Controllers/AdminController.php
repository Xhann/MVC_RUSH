<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

class AdminController extends AppController
{

    public function admin_view(Request $request)
    {
        $users=$this->orm->getAllUsers();
        return $this->render('admin_dashboard.html.twig', ['base' => $request->route,
      'error' => $this->flashError, 'users' => $users]);
    }

    public function delete_account(Request $request)
    {
      var_dump($this->session->getValues());
      return $this->render('admin_dashboard.html.twig', ['base' => $request->route,
      'error' => $this->flashError]);
      //$this->orm->getUserIdByEmail()
      //confirmation delete
      // msg de confirmation + redirection
    }
}