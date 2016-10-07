<?php

namespace App\Pc\Repository;

use Doctrine\DBAL\Connection;
use App\Pc\Entity\Pc;

/**
 * PC repository.
 */
class PCRepository
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
    * Returns an PC object.
    *
    * @return an pc object
    */
   public function getNameById($idpc)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('*')
           ->from('pc')
           ->where('idpc = '.$idpc);
       $statement = $queryBuilder->execute();
       $array = $statement->fetchAll();
       return new Pc($array[0]['idpc'], $array[0]['ospc']);
   }

   public function getIdByOS($ospc)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('*')
           ->from('pc')
           ->where('ospc = '."'".$ospc."'");
       $statement = $queryBuilder->execute();
       $array = $statement->fetchAll();
       return $array[0]['idpc'];
   }

   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('p.*')
           ->from('pc', 'p');

       $statement = $queryBuilder->execute();
       $pcsData = $statement->fetchAll();
       foreach ($pcsData as $pcData) {
           $pcEntityList[$pcData['idpc']] = new Pc($pcData['idpc'], $pcData['ospc']);
       }

       return $pcEntityList;
   }

}
