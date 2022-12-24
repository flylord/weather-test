<?php

class OpenMeteo implements WeatherServiceInterface {

  public function api(float $lat, float $lon): string {
    $url = 'https://api.open-meteo.com/v1/forecast?latitude=51.51&longitude=-0.13&hourly=temperature_2m';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
  }

  public function get(float $lat, float $lon): array {
    $response = $this->api($lat, $lon);

    return json_decode($response);
  }

}
