<?php

namespace App\Users\Repository;

use App\Users\Entity\User;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;

/**
 * User repository.
 */
class UserRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
    * Verify if the username and the password is correct.
    *
    * @param string $login
    *   The login of the user to connect.
    * @param string $password
    *   The password of the user to connect.
    * @return a json array of the user or an error;
    */
    public function connect($login, $password){
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('u.*')
        ->from('users','u')
        ->where('login = :login')
        ->setParameter(':login', $login)
        ->where('password = :password')
        ->setParameter(':password', $password);

        $statement = $queryBuilder->execute();
        $userData = $statement->fetchAll();
        $result = count($userData);
        if($result == 0 || $result > 1){
          return new Response('Connexion Error', 403, array('X-Status-Code' => 200));
        }
        $user = new User($userData[0]['id'], $userData[0]['nom'], $userData[0]['prenom'], $userData[0]['login'], $userData[0]['password']);
       return json_encode($user->toArray());

    }

   /**
    * Returns a collection of users.
    *
    * @param int $limit
    *   The number of users to return.
    * @param int $offset
    *   The number of users to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('users', 'u');

       $statement = $queryBuilder->execute();
       $usersData = $statement->fetchAll();

       foreach ($usersData as $userData) {
           $userEntityList[$userData['id']] = new User($userData['id'], $userData['nom'], $userData['prenom'], $userData['login'], $userData['password']);
       }

       return $userEntityList;
   }

   /**
    * Returns an User object.
    *
    * @param $id
    *   The id of the user to return.
    *
    * @return array A collection of users, keyed by user id.
    */
   public function getById($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('u.*')
           ->from('users', 'u')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $userData = $statement->fetchAll();

       return new User($userData[0]['id'], $userData[0]['nom'], $userData[0]['prenom'], $userData[0]['login'], $userData[0]['password']);
   }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();

        $queryBuilder
          ->delete('users')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('users')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['nom']) {
            $queryBuilder
              ->set('nom', ':nom')
              ->setParameter(':nom', $parameters['nom']);
        }

        if ($parameters['prenom']) {
            $queryBuilder
            ->set('prenom', ':prenom')
            ->setParameter(':prenom', $parameters['prenom']);
        }

        if ($parameters['login']) {
            $queryBuilder
            ->set('login', ':login')
            ->setParameter(':login', $parameters['login']);
        }

        if ($parameters['password']) {
            $queryBuilder
            ->set('password', ':password')
            ->setParameter(':password', $parameters['password']);
        }

        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();

        $queryBuilder
          ->insert('users')
          ->values(
              array(
                'nom' => ':nom',
                'prenom' => ':prenom',
                'login' => ':login',
                'password' => ':password'
                   )
          )
          ->setParameter(':nom', $parameters['nom'])
          ->setParameter(':prenom', $parameters['prenom'])
          ->setParameter(':login', $parameters['login'])
          ->setParameter(':password', $parameters['password']);

          $statement = $queryBuilder->execute();
    }
}
