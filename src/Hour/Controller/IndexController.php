<?php

namespace App\Hour\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{

    public function listAction(Request $request, Application $app){
      $hours = $app['repository.hour']->getAll();

      return $hours;
    }

}
