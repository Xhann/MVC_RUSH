<?php

namespace App\Controllers;

use App\Helpers\FlashError;
use WebFramework\AppController;
use App\Helpers\Session;
use WebFramework\Request;
use WebFramework\ORM;//ne pas oublier pr appel statique
use App\Models\User;

class AuthController extends AppController
{
  public function register_view(Request $request)
  {
    return $this->render('auth/register.html.twig', ['base' => $request->base,
      'error' => $this->flashError]);
  }

  public function register(Request $request) { 
    $user = new User();
    $user->setUsername($request->params['username']);
    $user->setEmail($request->params['email']);
    $user->setPassword($request->params['password']);
    $user->setPasswordConfirm($request->params['password_confirm']);

    try {
      $user->validate();
    } catch (\Exception $e) {
      $this->flashError->set($e->getMessage());
      $this->redirect('/' . $request->base . 'auth/register', '302');
      return;
    }

    //var_dump($user);
    
   
    // TODO: Store user in the database with the ORM (this->orm).
    $this->orm->getInstance();
    $this->orm->persist($user);
    $this->orm->flush($user);


    $this->redirect('/' . $request->base . 'login?msg=registered', '302');

    die();
  }
  public function login_view(Request $request)
  {
      

        $msg="";
        if (isset($request->params['msg']))
        {
          $msg=$request->params['msg'];
        }

        return $this->render('login.html.twig', ['base' => $request->base,
        'error' => $this->flashError->get(),'msg' => $msg]);

  }
      

 public function login(Request $request)
 {
    $username="";
    if (isset($request->params['username']))
    {
      $username=$request->params['username'];
    }
    $password="";
    if (isset($request->params['password']))
    {
      $password=$request->params['password'];
    }

    if ($this->orm->checkUser($request->params['username'],$request->params['password']))
    {
      
      // initialisation $_SESSION
      $userFetched=$this->orm->getUserByUsername($username);
      $this->session->getInstance();

      foreach ($userFetched as $field=>$value)
      {
        $this->session->set($field,$value);
      }
      $this->redirect('/' . $request->base . 'index', '302');
    }
    else
    { 
      $this->FlashError->getInstance();
      $this->FlashError->set("You are not registered, please register.");
      $this->redirect('/' . $request->base . 'login?error', '302');
      return;
    }


 }
 public function logout(Request $request)
 {
    $this->session->getInstance();
    $this->session->destroy();
    $this->redirect('/' . $request->base . 'login', '302');
 }

}
