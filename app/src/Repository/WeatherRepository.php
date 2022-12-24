<?php

namespace App\Repository;

use DateTimeImmutable;
use PDO;

final class WeatherRepository extends Repository {

  public function findByTime(int $cityId, DateTimeImmutable $date): ?array {
    $sql = "SELECT id, fk_city_id, weather_time, wdata FROM weather WHERE fk_city_id = :fk_city_id AND weather_time = :weather_time";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':fk_city_id', $cityId);
    $stmt->bindValue(':weather_time', $date->format('YmdH'));

    if ($stmt->execute()) {
      $rs = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return !empty($rs) ? $rs : null;
  }

  public function save(int $cityId, array $data): void {
    $date = DateTimeImmutable::createFromFormat('Y-m-d\TH:i', $data['current_weather']->time);

    $sql = "INSERT INTO weather (fk_city_id, weather_time, wdata) VALUE (:fk_city_id, :weather_time, :wdata)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':fk_city_id', $cityId);
    $stmt->bindValue(':weather_time', $date->format('YmdH'));
    $stmt->bindValue(':wdata', json_encode($data));
    $stmt->execute();
  }

}
