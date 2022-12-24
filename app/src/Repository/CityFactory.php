<?php

namespace App\Repository;

use App\System\Db\MysqlDb;

final class CityFactory {

  public static function get(): CityRepository {
    return new CityRepository(new MysqlDb());
  }

}
