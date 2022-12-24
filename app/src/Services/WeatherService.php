<?php

namespace App\Services;

use App\Api\WeatherServiceInterface;
use App\DTO\CityCollection;

class WeatherService {

  public function __construct(private readonly WeatherServiceInterface $ws) {
  }

  public function get(float $lat, float $lon): array {
    return $this->ws->get($lat, $lon);
  }

  public function getByCities(CityCollection $cities): array {
    $data = [];

    foreach ($cities as $city) {
      $data[] = [
        'city' => $city,
        'weather' => $this->get($city->getLat(), $city->getLng()),
      ];
    }

    return $data;
  }

}
