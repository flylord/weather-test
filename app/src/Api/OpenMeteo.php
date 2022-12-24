<?php

namespace App\Api;

final class OpenMeteo implements WeatherServiceInterface {

  private const URL = 'https://api.open-meteo.com/v1/forecast';

  public function api(float $lat, float $lon): string {
    $url = self::URL . '?' . http_build_query([
        'timezone' => 'GMT',
        'latitude' => $lat,
        'longitude' => $lon,
        'current_weather' => true,
        'daily' => [
          'temperature_2m_max', 'temperature_2m_min', 'precipitation_sum', 'windspeed_10m_max'
        ]
      ]);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
  }

  public function get(float $lat, float $lon): array {
    $response = (array)json_decode($this->api($lat, $lon));

    return $response;
  }

}
