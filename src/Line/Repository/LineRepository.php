<?php

namespace App\Line\Repository;

use App\Line\Entity\Line;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;

/**
 * Passage repository.
 */
class LineRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }



    public function getTravelStopId($idStartStop, $idEndStop){
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
