<?php

namespace Agares\BlogBundle\Controller;

use Agares\Blog\Domain\PostRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class FeedController
{
	/**
	 * @var PostRepositoryInterface
	 */
	private $postRepository;

	/**
	 * @var EngineInterface
	 */
	private $templating;

	public function __construct(PostRepositoryInterface $postRepository, EngineInterface $templating)
	{
		$this->postRepository = $postRepository;
		$this->templating = $templating;
	}

	public function atomAction()
	{
		$posts = $this->postRepository->findAll();
		return new Response($this->templating->render('BlogBundle:Feed:blog.xml.twig', ['posts' => $posts]), 200, ['Content-Type' => 'application/atom+xml;charset=utf-8']);
	}
}