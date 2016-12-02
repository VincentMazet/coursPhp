<?php

namespace App\Users\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function loginAction(Request $request, Application $app)
    {
      $parameters['login'] = $request->get('login');
      $parameters['password'] = $request->get('password');

      $result = $app['repository.user']->connect($parameters);

      return $result;
    }

    public function newUser(Request $request, Application $app){

      $parameters['firstName'] = $request->get('firstName');
      $parameters['lastName'] = $request->get('lastName');
      $parameters['login'] = $request->get('login');
      $parameters['password'] = $request->get('password');

      $result = $app['repository.user']->newUser($parameters);

      return $result;
    }

    public function listAction(Request $request, Application $app)
    {
        $users = $app['repository.user']->getAll();

        return $users;
    }

    public function deleteAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();


        return $app['repository.user']->delete($parameters['id']);
    }

    public function editAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $user = $app['repository.user']->getById($parameters['id']);

        return $user;
    }

    public function saveAction(Request $request, Application $app)
    {
        $parameters = $request->request->all();
        if ($parameters['id']) {
            $user = $app['repository.user']->update($parameters);
        }
        else {
            $user = $app['repository.user']->insert($parameters);
        }

        return $app->redirect($app['url_generator']->generate('users.list'));
    }

    public function newAction(Request $request, Application $app)
    {
            return $app['twig']->render('users.form.html.twig');
    }
}
