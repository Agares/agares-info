<?php
declare(strict_types = 1);

namespace Agares\Info;

use Agares\Info\ServiceProviders\ControllersServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

class Application
{
    /**
     * @var \Silex\Application
     */
    private $silex;

    public function __construct()
    {
        $this->silex = new \Silex\Application();
        $this->silex->register(new UrlGeneratorServiceProvider());
        $this->silex->register(new TwigServiceProvider());

        require_once __DIR__.'/../config/' . getenv('AGINFO_ENV') . '.php';
        configure($this->silex);

        $this->silex->register(new ControllersServiceProvider());
    }

    public function run()
    {
        $this->silex->run();
    }
}