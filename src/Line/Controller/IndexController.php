<?php

namespace App\Line\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{   
	/*
     *list all the lines from the db
     */
    public function listLines(Request $request, Application $app){
      $lines = $app['repository.line']->getAll();
      return $lines;
    }

}
