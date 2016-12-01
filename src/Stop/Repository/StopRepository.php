<?php

namespace App\Stop\Repository;

use App\Stop\Entity\Stop;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;

/**
* Passage repository.
*/
class StopRepository
{
  /**
  * @var \Doctrine\DBAL\Connection
  */
  protected $db;

  public function __construct(Connection $db)
  {
    $this->db = $db;
  }

  public function getStopForTravel($parameters){
    if ($this->stopExist($parameters)) {
      if ($this->getDirection($parameters)) {
        for ($numero = (int) $parameters['idStartStop']; $numero <= $parameters['idEndStop']; $numero++)
        {
          $tab[]=$numero;
        }

      }
      else {
        for ($numero = (int) $parameters['idStartStop']; $numero >= $parameters['idEndStop']; $numero--)
        {
          $tab[]=$numero;
        }
      }
      return json_encode($tab);
    }
    else {
      return new Response('Stop inconnu', 403, array('X-Status-Code' => 200));
    }

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

  public function stopExist($parameters){
    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
    ->select('stops.*')
    ->from('stops')
    ->where('id = :idStartStop')
    ->setParameter(':idStartStop', $parameters['idStartStop']);

    $statement = $queryBuilder->execute();
    $stopData = $statement->fetchAll();
    $result = count($stopData);
    if($result == 0 || $result > 1){
      return false;
    }
    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
    ->select('stops.*')
    ->from('stops')
    ->where('id = :idEndStop')
    ->setParameter(':idEndStop', $parameters['idEndStop']);

    $statement = $queryBuilder->execute();
    $stopData = $statement->fetchAll();
    $result = count($stopData);
    if($result == 0 || $result > 1){
      return false;
    }
    return true;
  }

  public function getAll(){
    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
        ->select('s.*')
        ->from('stops','s');

    $statement = $queryBuilder->execute();
    $stopsData = $statement->fetchAll();
    if (count($stopsData) == 0){
      return new Response('No result', 403, array('X-Status-Code' => 200));
    }
    foreach ($stopsData as $stopData) {
        $stopEntityList[$stopData['id']] = (new Stop($stopData['id'], $stopData['name'], $stopData['description'], $stopData['latitude'], $stopData['longitude']))->toArray();
    }


    return json_encode($stopEntityList);
  }




}
