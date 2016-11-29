<?php

namespace App\Passage\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
	public function getLine(Request $request, Application $app)
	    {
		$parameters = $num_line = $request->get('num_line');
    $num_line = $parameters;
 		 $result = $app['repository.passage']->getLine($num_line);

		return $result;
	    }

			public function test(){
				return "OK";
			}

}
