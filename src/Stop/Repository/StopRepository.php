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





}
