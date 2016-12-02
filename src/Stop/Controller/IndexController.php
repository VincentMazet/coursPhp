<?php

namespace App\Stop\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{

  public function getStopForTravel(Request $request, Application $app)
  {
        $parameters['idStartStop'] = $request->get('idStartStop');
        $parameters['idEndStop'] = $request->get('idEndStop');
        $result = $app['repository.stop']->getStopForTravel($parameters);
        return $result;

  }

  public function getAll(Request $request, Application $app)
  {
    $result = $app['repository.stop']->getAll();
    return $result;
  }

  public function getIdByName(Request $request, Application $app)
  {
    $parameters['name'] = $request->get('name');
    $result = $app['repository.stop']->getIdByName($parameters);
    return $result;
  }


}
