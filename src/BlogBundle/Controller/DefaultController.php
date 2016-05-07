<?php

namespace Agares\BlogBundle\Controller;

use Agares\Blog\Domain\PostRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class DefaultController
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

    public function indexAction()
    {
        $posts = $this->postRepository->findAll();
        return new Response($this->templating->render('BlogBundle:Default:index.html.twig', ['posts' => $posts]));
    }

    public function postAction(string $slug)
    {
	    $post = $this->postRepository->findNewestVersionBySlug($slug);

        return new Response($this->templating->render('BlogBundle:Default:post.html.twig', ['post' => $post]));
    }
}
