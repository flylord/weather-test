<?php
require_once __DIR__.'/vendor/autoload.php';
include_once __DIR__ . '/Config.php';

use App\System\Http\Router;


$Router = new Router();
$Router->add(\App\Controller\IndexController::class);
$Router->add(\App\Controller\WeatherController::class);

$Router->run();
