<?php

namespace App\Stop\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
*Stop controller
*/
class IndexController
{

  /**
   *list stops
   *
   *@return an array collection of stops, keyed by stop id.
   */
  public function listStops(Request $request, Application $app)
  {

    $result = $app['repository.stop']->getAll();
    return $result;
  }

  /**
   *retrieve the id of a stop by his name
   *
   *@return stop object.
   */
  public function getStopIdByName(Request $request, Application $app)
  {
    $parameters['name'] = $request->get('name');
    $result = $app['repository.stop']->getIdByName($parameters);

    return $result;
  }

  /**
   *retrieve all the ids of stops in a line between two id of stops
   *
   *@return array of id's stops.
   */
  public function listTravelStopId(Request $request, Application $app)
  {
        $parameters['idStartStop'] = $request->get('idStartStop');
        $parameters['idEndStop'] = $request->get('idEndStop');
        $result = $app['repository.stop']->getStopForTravel($parameters);

        return $result;
  }
}
