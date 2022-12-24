<?php

namespace App\System\Db;

use PDO;

interface DbInterface {

  public function connect(): PDO;

}
