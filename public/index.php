<?php
declare(strict_types = 1);

use Silex\Application;

if(getenv('AGINFO_ENV') === 'prod') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}

require_once __DIR__.'/../vendor/autoload.php';

$app = new \Agares\Info\Application();
$app->run();