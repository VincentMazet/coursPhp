<?php

namespace App\Utils\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{

    /*
     *list all the data from the db
     */
    public function getDataDb(Request $request, Application $app){
      $lines = $app['repository.line']->getAll();

      return $lines;
    }
}
