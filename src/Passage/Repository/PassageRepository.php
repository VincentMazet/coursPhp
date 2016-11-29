<?php

namespace App\Passage\Repository;

use App\Passage\Entity\Passage;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;

/**
 * Passage repository.
 */
class PassageRepository
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
    public function getLine($num_line){
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('p.*')
        ->from('passages','p')
        ->where('num_line = :num_line')
        ->setParameter(':num_line', $num_line);

        $statement = $queryBuilder->execute();
        $lineDatas = $statement->fetchAll();
        $result = count($lineDatas);
        if($result == 0 ){
          return new Response('No line with this id :'.$num_line, 403, array('X-Status-Code' => 200));
        }
        foreach ($lineDatas as $lineData) {
          $passage = new Passage($lineData['id'], $lineData['name_stop'], $lineData['num_line'], $lineData['hour'], $lineData['next_stop'], $lineData['previous_stop']);
           $passageEntityList[$lineData['id']] = $passage->toArray();

       }
              //return json_encode($user->toArray());
       return json_encode($passageEntityList);
    }

    public function getAllStops(){
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('p.*')
        ->from('passages','p');

        $statement = $queryBuilder->execute();
        $lineDatas = $statement->fetchAll();
        foreach ($lineDatas as $lineData) {
          $passage = new Passage($lineData['id'], $lineData['name_stop'], $lineData['num_line'], $lineData['hour'], $lineData['next_stop'], $lineData['previous_stop']);
          $passageEntityList[$lineData['id']] = $passage->toArray();

       }
       return json_encode($passageEntityList);
    }

    public function getStopNameById($id)
    {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('p.name_stop')
        ->from('passages','p')
        ->where('id = :id')
        ->setParameter(':id', $id);
        $statement = $queryBuilder->execute();
        $lineDatas = $statement->fetchAll();

       return json_encode($lineDatas);
    }

    public function getNextStop($id)
    {
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('p.next_stop')
        ->from('passages','p')
        ->where('id = :id')
        ->setParameter(':id', $id);
        $statement = $queryBuilder->execute();
        $lineDatas = $statement->fetchAll();

       return json_encode($lineDatas);
    }

    public function getPreviousStop($id){
      $queryBuilder = $this->db->createQueryBuilder();
      $queryBuilder
        ->select('p.previous_stop')
        ->from('passages','p')
        ->where('id = :id')
        ->setParameter(':id', $id);
        $statement = $queryBuilder->execute();
        $lineDatas = $statement->fetchAll();

       return json_encode($lineDatas);
    }






}
