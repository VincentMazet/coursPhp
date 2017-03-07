<?php

namespace App\Line\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
* Line controller
*/
class IndexController
{
		/**
     *list all the lines
		 *
		 *@return an array collection of lines, keyed by line id.
     */
    public function listLines(Request $request, Application $app){
      $lines = $app['repository.line']->getAll();
      return $lines;
    }

}
