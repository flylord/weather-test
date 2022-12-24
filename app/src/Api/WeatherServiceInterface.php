<?php

namespace App\Api;

interface WeatherServiceInterface {

  public function api(float $lat, float $lon): string;

  public function get(float $lat, float $lon): array;

}
