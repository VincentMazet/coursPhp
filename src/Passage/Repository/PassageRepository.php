<?php

namespace App\Passage\Repository;

use App\Passage\Entity\Passage;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;

/**
 * Passage repository.
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
    * get all the stops from a line;
    *
    * @param int $idLine
    *   The id of the line that we want.
    * @return a json array of passages or an error;
    */
    public function getLine($idLine){
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('p.*')
        ->from('passage','p')
        ->where('id = :idLind')
        ->setParameter(':idLine', $idLine);

        $statement = $queryBuilder->execute();
        $lineDatas = $statement->fetchAll();
        $result = count($lineDatas);
        if($result == 0 ){
          return new Response('No line with this id :'.$idLine, 403, array('X-Status-Code' => 200));
        }
        foreach ($lineDatas as $lineData) {
           $passageEntityList[$lineData['id']] = new Passage($lineData['id'], $lineData['nameStop'], $lineData['numLine'], $lineData['hour'], $lineData['nextStop'], $previousStop);
       }
              //return json_encode($user->toArray());
       return $passageEntityList;
    }
}
