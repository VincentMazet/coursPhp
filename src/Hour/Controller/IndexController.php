<?php

namespace App\Hour\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{

    /*
     *list all the Hours
     */
    public function listHours(Request $request, Application $app){
      $hours = $app['repository.hour']->getAll();

      return $hours;
    }

    /*
     *Retrieve the hours of start and end of a travel in a line because of an hour of start
     */
    public function getTravelFromStopsId(Request $request, Application $app){
    	$parameters['idStartStop'] = $request->get('idStartStop');
      $parameters['idEndStop'] = $request->get('idEndStop');
      $parameters['hour'] = $request->get('hour');
    	$result = $app['repository.hour']->getHoursBetweenStops($parameters);

    	return $result;
    }



}
