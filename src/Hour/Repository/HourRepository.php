<?php

namespace App\Hour\Repository;

use App\Hour\Entity\Hour;

use Symfony\Component\HttpFoundation\Response;


use Doctrine\DBAL\Connection;


/**
 * Hour repository.
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

    /**
    *list all the hours
    *
    *@return an array collection of hours, keyed by hour id.
    */
    public function getAll()
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
            ->select('hours.*')
            ->from('hours');
        $statement = $queryBuilder->execute();
        $hoursData = $statement->fetchAll();

        foreach ($hoursData as $hourData) {
          $hourEntityList[$hourData['id']] = (new Hour($hourData['id'], $hourData['id_stop'], $hourData['id_line'], $hourData['hour'], $hourData['direction'], $hourData['idStartStop'], $hourData['idEndStop']))->toArray();
        }

        return json_encode($hourEntityList);
    }

    /**
    * travel function
    *
    *@return the next hour of the two stops selected, keyed by id's.
    */
    public function getHoursBetweenStops($parameters)
    {
        if ($parameters['hour'] == null) {
            $time =  date('H:m');
        }else {
            $time = $parameters['hour'];
        }

        if(!$this->checkLine($parameters['idStartStop'], $parameters['idEndStop'], $hourData['idStartStop'], $hourData['idEndStop'])){
            die();
        }

        $queryBuilder = $this->db->createQueryBuilder();

        $queryBuilder
            ->select('h.*')
            ->from('hours','h')
            ->where('id_stop = :idStartStop')
            ->setParameter(':idStartStop', $parameters['idStartStop']);
        $statement = $queryBuilder->execute();
        $hoursStartData = $statement->fetchAll();

        $first = true;
        $firstStartStop = null;
        foreach($hoursStartData as $hourData){
            if(strtotime($hourData['hour']) >= strtotime($time)){
                if ($first == true){
                    $firstStartStop = $hourData;
                    $first = false;
                }
            }
        }

         $queryBuilder
             ->select('h.*')
             ->from('hours','h')
             ->where('id_stop = :idEndStop')
             ->setParameter(':idEndStop', $parameters['idEndStop']);
         $statement = $queryBuilder->execute();
         $hoursStopData = $statement->fetchAll();

         $first = true;
         $firstEndStop = null;
         foreach($hoursStopData as $hourData){
             if(strtotime($hourData['hour']) >= strtotime($firstStartStop['hour'])){
                 if ($first == true){
                     $firstEndStop = $hourData;
                     $first = false;
                 }
             }
         }

          $hourEntityList[$firstStartStop['id']] = (new Hour($firstStartStop['id'], $firstStartStop['id_stop'], $firstStartStop['id_line'], $firstStartStop['hour'], $hourData['direction'], $hourData['idStartStop'], $hourData['idEndStop']))->toArray();
          $hourEntityList[$firstEndStop['id']] = (new Hour($firstEndStop['id'], $firstEndStop['id_stop'], $firstEndStop['id_line'], $firstEndStop['hour'], $hourData['direction'], $hourData['idStartStop'], $hourData['idEndStop']))->toArray();

         return json_encode($hourEntityList);
    }

    private function checkLine($idStartStop, $idEndStop)
    {
        $queryBuilder = $this->db->createQueryBuilder();

        $queryBuilder
            ->select('h.*')
            ->from('hours','h')
            ->where('id_stop = :idStartStop')
            ->setParameter(':idStartStop', $idStartStop);
        $statement = $queryBuilder->execute();
        $hoursStartData = $statement->fetchAll();

        $idLines = array();

        foreach($hoursStartData as $hourData){
            array_push($idLines, $hourData['id_line']);
        }

        $queryBuilder
            ->select('h.*')
            ->from('hours','h')
            ->where('id_stop = :idEndStop')
            ->setParameter(':idEndStop', $idEndStop);
        $statement = $queryBuilder->execute();
        $hoursStopData = $statement->fetchAll();

        foreach ($hoursStopData as $hourData) {
            foreach ($idLines as $key) {
                if($key == $hourData['id_line']){
                    return true;
                }
            }
        }
        return false;
    }
}
