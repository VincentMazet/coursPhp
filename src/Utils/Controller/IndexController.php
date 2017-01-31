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
      $hours = $app['repository.hour']->getAll();
      $users = $app['repository.user']->getAll();
      $stops = $app['repository.stop']->getAll();
      $lines = $app['repository.line']->getAll();

      return json_encode(['hours' => $hours, 'users' => $users, 'stops' => $stops, 'lines' => $lines]);
    }
}
