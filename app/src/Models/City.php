<?php

namespace App\Models;

use JsonSerializable;

final class City implements JsonSerializable {

  private int $id;
  private string $name;
  private float $lat;
  private float $lng;
  private string $country;
  private float $levenshtein;

  /**
   * @param int $id
   * @param string $name
   * @param float $lat
   * @param float $lng
   * @param string $country
   * @param float $levenshtein
   */
  public function __construct(int $id, string $name, float $lat, float $lng, string $country, float $levenshtein = 0) {
    $this->id = $id;
    $this->name = $name;
    $this->lat = $lat;
    $this->lng = $lng;
    $this->country = $country;
    $this->levenshtein = $levenshtein;
  }

  public function jsonSerialize(): array {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'lat' => $this->lat,
      'lng' => $this->lng,
      'country' => $this->country,
    ];
  }

  /*
   * TODO: validate data from $city (if they exist)
   */
  public static function init(array $city): self {
    $lat = (float)$city['lat'];
    $lng = (float)$city['lng'];
    return new self($city['id'], $city['name'], $lat, $lng, $city['country'], $city['levenshtein']);
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * @return float
   */
  public function getLat(): float {
    return $this->lat;
  }

  /**
   * @return float
   */
  public function getLng(): float {
    return $this->lng;
  }

  /**
   * @return string
   */
  public function getCountry(): string {
    return $this->country;
  }

  /**
   * @return float
   */
  public function getLevenshtein(): float {
    return $this->levenshtein;
  }

}
