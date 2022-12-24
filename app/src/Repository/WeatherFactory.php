<?php

namespace App\Repository;

use App\System\Db\MysqlDb;

final class WeatherFactory {

  public static function get(): WeatherRepository {
    return new WeatherRepository(new MysqlDb());
  }

}
