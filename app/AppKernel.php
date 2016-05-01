<?php

use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
	/**
	 * Returns an array of bundles to register.
	 *
	 * @return BundleInterface[] An array of bundle instances.
	 */
	public function registerBundles()
	{
		$bundles = [
			new FrameworkBundle(),
			new TwigBundle(),
			new MonologBundle(),
			new SensioFrameworkExtraBundle(),
            new Agares\AppBundle\AppBundle(),
        ];

		if($this->getEnvironment() === 'dev') {
			$bundles[] = new \Symfony\Bundle\DebugBundle\DebugBundle();
			$bundles[] = new \Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
			$bundles[] = new \Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
		}

		return $bundles;
	}

	public function getRootDir()
	{
		return __DIR__;
	}

	public function getCacheDir()
	{
		return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
	}

	public function getLogDir()
	{
		return dirname(__DIR__).'/var/logs';
	}

	public function registerContainerConfiguration(LoaderInterface $loader)
	{
		$loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
	}
}