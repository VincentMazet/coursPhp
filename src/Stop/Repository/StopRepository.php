<?php

namespace App\Stop\Repository;

use App\Stop\Entity\Stop;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;

/**
* Stop repository.
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

  /**
  *return an array of idStops between a idStart and a idEnd
  */
  public function getStopForTravel($parameters){
    $i = 1;
    if ($this->stopExist($parameters['idStartStop']) && $this->stopExist($parameters['idStartStop'])) {
      if ($this->getDirection($parameters)) {
        for ($numero = (int) $parameters['idStartStop']; $numero <= $parameters['idEndStop']; $numero++)
        {
          $tab[$i]=$numero;
          $i++;
        }

      }
      else {
        for ($numero = (int) $parameters['idStartStop']; $numero >= $parameters['idEndStop']; $numero--)
        {
          $tab[$i]=$numero;
          $i++;
        }
      }
      return json_encode($tab);
    }
    else {
      return new Response('Stop inconnu', 403, array('X-Status-Code' => 200));
    }
  }

  /**
  *check if a stop exist by his id
  */
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
    return true;
  }

  /**
  *list all the stops
  */
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

  /**
  *Return an id Stop by the name of the stop
  */
  public function getIdByName($parameters){
    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
        ->select('s.*')
        ->from('stops','s')
        ->where('name = :name')
        ->setParameter(':name', $parameters['name']);

    $statement = $queryBuilder->execute();
    $stopsData = $statement->fetchAll();
    if (count($stopsData) != 1){
      return new Response('Wrong stop name', 403, array('X-Status-Code' => 200));
    }

    return json_encode($stopsData[0]['id']);
  }




}
