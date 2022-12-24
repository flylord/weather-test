<?php

namespace App\System\Db;

use Config;
use PDO;

final class MysqlDb implements DbInterface {

  public function connect(): PDO {
    return new PDO('mysql:host=' . Config::DB_HOST. ';dbname=' . Config::DB_NAME . ';charset=utf8', Config::DB_USER, Config::DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
  }

}
