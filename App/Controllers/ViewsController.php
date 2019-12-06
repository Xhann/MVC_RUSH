<?php

namespace App\Controllers;

use App\Models\Privileges;
use WebFramework\AppController;
use WebFramework\Request;

class ViewsController extends AppController
{
  public function index(Request $request)
  {

  $this->session->getInstance();
  $users=$this->session->getValues();
  $privileges="";
  if ($this->session->get('privileges'))
  {
    $privileges=$users['privileges'];
    $username=$users['username'];
    
    if ($privileges==Privileges::USER)
    {
      return $this->render('index.html.twig', ['base' => $request->base,
      'error' => $this->flashError, 'username' => $username ]);
    }
    if ($privileges==Privileges::ADMIN)
    {
      return $this->render('admin.html.twig', ['base' => $request->base,
      'error' => $this->flashError, 'username' => $username ]);
    }
    
  }
  else
  {
    $this->redirect('/' . $request->base . 'login', '302');
  }
    
  }

  



}