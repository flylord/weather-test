<?php

namespace App\Repository;

use App\System\Db\DbInterface;
use PDO;

class Repository {

  protected PDO $db;

  public function __construct(DbInterface $db) {
    $this->db = $db->connect();
  }


}
