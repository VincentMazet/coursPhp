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

    /**
    * Returns a collection of Lines.
    *
    * @return array A collection of lines, keyed by line id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select(' * FROM `lines`');

       $statement = $queryBuilder->execute();
       $linesData = $statement->fetchAll();
       if (count($linesData) == 0){
         return new Response('No result', 403, array('X-Status-Code' => 200));
       }
       foreach ($linesData as $lineData) {
           $lineEntityList[$lineData['id']] = (new Line($lineData['id'], $lineData['name']))->toArray();
       }
       return json_encode($lineEntityList);
   }
}
