<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;
use App\Helpers\Session;

use App\Models\User;

class ViewsController extends AppController
{
  public function index(Request $request)
  {

  $this->session->getInstance();
  $users=$this->session->getValues();
  $username="";
  if ($this->session->get('username'))
  {
    $username=$users['username'];
    return $this->render('index.html.twig', ['base' => $request->base,
      'error' => $this->flashError, 'username' => $username ]);
  }
  else
  {
    $this->redirect('/' . $request->base . 'login', '302');
  }
    
  }

  



}