<?php

class WeatherService {

  public function __construct(private readonly WeatherServiceInterface $meteoService) {
  }


  public function get(float $lat, float $lon): array {
    return $this->meteoService->get($lat, $lon);
  }

}
