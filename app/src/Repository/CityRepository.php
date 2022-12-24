<?php

namespace App\Repository;

use App\Collections\CityCollection;
use App\Models\City;
use App\System\Db\DbInterface;
use PDO;

final class CityRepository {

  private PDO $db;

  public function __construct(DbInterface $db) {
    $this->db = $db->connect();
  }

  public function findSimilar(string $name): CityCollection {
    $cities = [];

    $sql = "SELECT id, name, lat, lng, country FROM cities WHERE name SOUNDS LIKE :name LIMIT 0, 2";
    $stmt = $this->db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $stmt->bindValue(':name', $name);

    if ($stmt->execute() && $stmt->rowCount() > 0) {
      while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $lev = levenshtein($name, $rs['name']);
//        $sim = similar_text($name, $rs['name'], $lev);
        if ($lev <= 3) {
          $rs['levenshtein'] = $lev;
          $cities[] = City::init($rs);
        }
      }
    }
    usort($cities, function (City $a, City $b) {
      if ($a->getLevenshtein() == $b->getLevenshtein()) {
        return 0;
      }

      return ($a->getLevenshtein() < $b->getLevenshtein()) ? -1 : 1;
    });

    return new CityCollection($cities);
  }

}
