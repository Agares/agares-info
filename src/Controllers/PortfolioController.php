<?php
declare(strict_types = 1);

namespace Agares\Info\Controllers;

use Agares\Info\Domain\Portfolio;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class PortfolioController implements ControllerProviderInterface
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
        $viewContext = [
            'portfolio' => new Portfolio()
        ];

        return $this->twig->render('portfolio/portfolio.html.twig', $viewContext);
    }

    /**
     * @inheritdoc
     */
    public function connect(Application $app) : ControllerCollection
    {
        /** @var ControllerCollection $routes */
        $routes = $app['controllers_factory'];
        $routes->get('/', array($this, 'homepage'))->bind('portfolio');

        return $routes;
    }
}