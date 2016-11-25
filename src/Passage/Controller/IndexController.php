<?php

namespace App\Passage\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
	public function getLine(Request $request, Application $app)
	    {
		$parameters = $request->request->all();
       		 $idLine = $parameters['id_line'];
 		 $result = $app['repository.passage']->getLine($idLine);

		return $result;
	    }

}
