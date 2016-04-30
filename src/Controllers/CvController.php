<?php
declare(strict_types = 1);

namespace Agares\Info\Controllers;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class CvController implements ControllerProviderInterface
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(\Twig_Environment $twig) {
        $this->twig = $twig;
    }

    public function homepage(Request $request) : string
    {
        return $this->twig->render('cv/cv.html.twig');
    }

    /**
     * @inheritdoc
     */
    public function connect(Application $app) : ControllerCollection
    {
        /** @var ControllerCollection $routes */
        $routes = $app['controllers_factory'];
        $routes->get('/', array($this, 'homepage'))->bind('cv');

        return $routes;
    }
}