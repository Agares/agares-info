<?php
declare(strict_types = 1);

function configure(\Silex\Application $app) {
    $app['debug'] = true;
    $app['twig.path'] = realpath(__DIR__.'/../views/');
}