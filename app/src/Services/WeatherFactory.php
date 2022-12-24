<?php

namespace App\Services;

use App\Api\OpenMeteo;
use App\Repository\WeatherRepositoryFactory;

class WeatherFactory {

  public static function get(): WeatherService {
    return new WeatherService(new OpenMeteo(), WeatherRepositoryFactory::get());
  }

}
