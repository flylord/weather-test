<?php

namespace App\Services;

use App\Api\OpenMeteo;

class WeatherFactory {

  public static function get(): WeatherService {
    return new WeatherService(new OpenMeteo());
  }

}
