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
            ->select('hours.*')
            ->from('hours');
        $statement = $queryBuilder->execute();
        $hoursData = $statement->fetchAll();

        foreach ($hoursData as $hourData) {
          $hourEntityList[$hourData['id']] = (new Hour($hourData['id'], $hourData['id_stop'], $hourData['id_line'], $hourData['hour']))->toArray();
        }

        return json_encode($hourEntityList);
    }
    //FIXME : ATTENTION HARDCODING degeulasse
    public function getHoursBetweenStops($parameters)
    {
       $time =  date('H:m');
     //  $time = "12:00"; //FOR TEST
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('h.*')
            ->from('hours','h')
            ->where('id_stop = :idStartStop')
            ->setParameter(':idStartStop', $parameters['idStartStop'])
            ->orwhere('id_stop = :idEndStop')
            ->setParameter(':idEndStop', $parameters['idEndStop']); 
        $statement = $queryBuilder->execute();
        $hoursData = $statement->fetchAll();

        $hourStartList = null;
        $hourEndList = null;

        foreach ($hoursData as $hourData) {
            if($hourStartList == null && $hourData['id_stop'] == $parameters['idStartStop'] && strtotime($hourData['hour']) >= strtotime($time)) {
                $hourStartList = $hourData;
            }else if($hourEndList == null && $hourData['id_stop'] == $parameters['idEndStop'] && strtotime($hourData['hour']) >= strtotime($time)) {
                $hourEndList = $hourData;
            }
        }
        $hourEntityList[$hourStartList['id']] = (new Hour($hourStartList['id'], $hourStartList['id_stop'], $hourStartList['id_line'], $hourStartList['hour']))->toArray();
        $hourEntityList[$hourEndList['id']] = (new Hour($hourEndList['id'], $hourEndList['id_stop'], $hourEndList['id_line'], $hourEndList['hour']))->toArray();
        return json_encode($hourEntityList);
    }
}
