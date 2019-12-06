<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;
use App\Helpers\Session;

use App\Models\User;

class ArticlesController extends AppController
{
    public function articles_view(Request $request)
    {
      $username=$this->session->get("username");
        return $this->render('articles/articles.html.twig', ['base' => $request->base,
      'error' => $this->flashError, 'username'=>$username]);
    }

    public function article_by_id(Request $request)
    {
      return $this->render('articles/article.html.twig', ['base' => $request->base,
      'error' => $this->flashError]);
    }

    public function edit_article(Request $request)
    {
      return $this->render('articles/edit_article.html.twig', ['base' => $request->base,
      'error' => $this->flashError]);
    }
}