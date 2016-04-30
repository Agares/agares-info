<?php
declare(strict_types = 1);

namespace Agares\Info\Controllers;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class BlogController implements ControllerProviderInterface
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
        $post = file_get_contents(__DIR__.'/../../posts/2016-04-29-1-modelling-people-s-names-is-hard.html');
        return $this->twig->render('blog/blog.html.twig', ['post' => $post]);
    }

    /**
     * @inheritdoc
     */
    public function connect(Application $app) : ControllerCollection
    {
        /** @var ControllerCollection $routes */
        $routes = $app['controllers_factory'];
        $routes->get('/', array($this, 'homepage'))->bind('blog');

        return $routes;
    }
}
