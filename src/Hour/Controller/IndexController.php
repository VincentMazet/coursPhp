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

    public function getTravelStopId(Request $request, Application $app)
    {
          $parameters['idStartStop'] = $request->get('idStartStop');
          $parameters['idEndStop'] = $request->get('idEndStop');
          $result = $app['repository.hour']->getTravelStopId($parameters);
          return $result;

    }


}
