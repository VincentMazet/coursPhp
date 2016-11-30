<?php

namespace App\Line\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{

	public function getTravelStopId(Request $request, Application $app)
	{
				$idStartStop = $request->get('idStartStop');
				$idEndStop = $request->get('idEndStop');
				$result = $app['repository.line']->getTravelStopId($idStartStop,$idEndStop);
				return $result;
	}



}
