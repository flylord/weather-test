<?php

namespace App\Services;

use App\Api\WeatherServiceInterface;
use App\DTO\CityCollection;
use App\Repository\WeatherRepository;
use DateTimeImmutable;

final class WeatherService {

  public function __construct(private readonly WeatherServiceInterface $ws, private readonly WeatherRepository $weatherRepository) {
  }

  public function get(float $lat, float $lon): array {
    return $this->ws->get($lat, $lon);
  }

  public function getByCities(CityCollection $cities): array {
    $data = [];

    foreach ($cities as $city) {
      $cityWeatherData = $this->weatherRepository->findByTime($city, new DateTimeImmutable());
      if ($cityWeatherData == null) {
        $wdata = $this->get($city->getLat(), $city->getLng());
        $this->weatherRepository->save($city, $wdata);
      } else {
        $wdata = (array)json_decode($cityWeatherData['wdata']);
      }

      $data[] = [
        'city' => $city,
        'weather' => $wdata,
      ];
    }

    return $data;
  }

}
