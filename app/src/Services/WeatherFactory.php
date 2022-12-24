<?php

class WeatherFactory {

  public function get(): WeatherServiceInterface {
    return new WeatherService(new OpenMeteo());
  }

}
