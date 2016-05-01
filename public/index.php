<?php
declare(strict_types = 1);

use Symfony\Component\HttpFoundation\Request;

if(getenv('AGINFO_ENV') === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/AppKernel.php';
include_once __DIR__.'/../var/bootstrap.php.cache';

$kernel = new AppKernel(getenv('AGINFO_ENV'), getenv('AGINFO_ENV') === 'dev');
$kernel->loadClassCache();

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);