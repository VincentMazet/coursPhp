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



}
