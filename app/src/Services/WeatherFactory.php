<?php

namespace App\Services;

class WeatherFactory {

  public static function get(): WeatherService {
    return new WeatherService(new OpenMeteo());
  }

}
