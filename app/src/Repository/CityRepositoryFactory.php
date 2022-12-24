<?php

namespace App\Repository;

use App\System\Db\MysqlDb;

final class CityRepositoryFactory {

  public static function get(): CityRepository {
    return new CityRepository(new MysqlDb());
  }

}
