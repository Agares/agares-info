<?php
declare(strict_types = 1);

namespace Agares\Info\ServiceProviders;

use Agares\Info\Controllers\CvController;
use Agares\Info\Controllers\HomepageController;
use Agares\Info\Controllers\PortfolioController;
use Agares\Info\Controllers\BlogController;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ControllersServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Application $app)
    {
        $app->mount('', new HomepageController($app['twig']));
        $app->mount('portfolio', new PortfolioController($app['twig']));
        $app->mount('cv', new CvController($app['twig']));
        $app->mount('blog', new BlogController($app['twig']));
    }

    /**
     * @inheritdoc
     */
    public function boot(Application $app)
    {
    }
}
