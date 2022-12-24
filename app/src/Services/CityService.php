<?php

namespace App\Services;

use App\System\Db\DbInterface;
use PDO;

class CityService {

  private PDO $db;

  public function __construct(DbInterface $db) {
    $this->db = $db->connect();
  }

  public function find(string $name) {
    $sql = "SELECT id, name, lat, lng, country FROM cities WHERE SOUNDEX(name) LIKE SOUNDEX(:name)";
    $stmt = $this->db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $stmt->bindValue(':name', $name);
    $stmt->execute();
    return $stmt->fetchAll();
  }

}
