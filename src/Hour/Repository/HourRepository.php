<?php

namespace App\Hour\Repository;

use App\Hour\Entity\Hour;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;

/**
 * Passage repository.
 */
class HourRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('h.*')
            ->from('hours', 'h');

        $statement = $queryBuilder->execute();
        $hoursData = $statement->fetchAll();

        foreach ($hoursData as $hourData) {
          $hourEntityList[$hourData['id']] = (new Hour($hourData['id'], $hourData['id_stop'], $hourData['id_line'], $hourData['direction'], $hourData['hour']))->toArray();
        }

        return json_encode($hourEntityList);
    }


      public function getTravelStopId($parameters){
if ($this->getDirection($parameters)) {
  $queryBuilder = $this->db->createQueryBuilder();
  $queryBuilder
  ->select('h.hour')
  ->from('hours','h')
  ->where('going = 1');
  $statement = $queryBuilder->execute();
  $hoursDatas = $statement->fetchAll();
  }
else {
  $queryBuilder = $this->db->createQueryBuilder();
  $queryBuilder
  ->select('h.hour')
  ->from('hours','h')
  ->where('going = 0');
  $statement = $queryBuilder->execute();
  $hoursDatas = $statement->fetchAll();
}
foreach ($hoursDatas as $hourData) {
    $hourEntityList[$hourData['id']] = (new Hour($hourData['id'], $hourData['id_stop'], $hourData['id_line'], $hourData['going'], $hourData['hour']))->toArray();
}


return json_encode($hourEntityList);

      }

      public function getDirection($parameters){
        if ($parameters['idStartStop']<$parameters['idEndStop']) {
          $retVal = true;
        }
        else {
            $retVal = false;
        }
        return $retVal;
      }



}
