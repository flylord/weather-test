<?php

namespace App\Services;

use App\System\Db\MysqlDb;

class CityFactory {

  public static function get(): CityService {
    return new CityService(new MysqlDb());
  }

}
