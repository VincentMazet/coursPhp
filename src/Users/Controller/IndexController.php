<?php

namespace App\Users\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
*User Controller
*/
class IndexController
{

    /*
     *List all the users
     */
    public function listUsers(Request $request, Application $app)
    {
        $users = $app['repository.user']->getAll();

        return $users;
    }

    /*
     *Create a new user
     */
    public function newUser(Request $request, Application $app){

      $parameters['firstName'] = $request->get('firstName');
      $parameters['lastName'] = $request->get('lastName');
      $parameters['login'] = $request->get('login');
      $parameters['password'] = $request->get('password');

      $result = $app['repository.user']->newUser($parameters);

      return $result;
    }

    /*
     *delete an user
     */
    public function deleteUser(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();


        return $app['repository.user']->delete($parameters['id']);
    }

    /*
     *edit an user
     */
    public function updateUser(Request $request, Application $app)
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

    /*
     *log a user
     */
    public function loginUser(Request $request, Application $app)
    {
      $parameters['login'] = $request->get('login');
      $parameters['password'] = $request->get('password');

      $result = $app['repository.user']->connect($parameters);

      return $result;
    }
}
