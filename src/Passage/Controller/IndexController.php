<?php

namespace App\Passage\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
	public function getLine(Request $request, Application $app)
	    {
		$parameters = $request->get('num_line');
    $num_line = $parameters;
 		 $result = $app['repository.passage']->getLine($num_line);

		return $result;
	    }

	public function getAllStops(Application $app)
	{
		return $app['repository.passage']->getAllStops();
	}

	public function getStopNameById(Request $request, Application $app)
	{
				$id = $request->get('id');
				$result = $app['repository.passage']->getStopNameById($id);
				return $result;
	}

	public function getNextStop(Request $request, Application $app)
	{
				$id = $request->get('id');
				$result = $app['repository.passage']->getNextStop($id);
				return $result;
	}

	public function getPreviousStop(Request $request, Application $app)
	{
				$id = $request->get('id');
				$result = $app['repository.passage']->getPreviousStop($id);
				return $result;
	}
}
