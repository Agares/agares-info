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
/*        $post = json_decode(file_get_contents($this->getParameter('kernel.root_dir').'/../posts/2016-04-29-1-modelling-people-s-names-is-hard.json'), true);
        $post['id'] = $post['published'] . '-' . $post['version'] . '-' . $post['slug'];
*/
	    $post = $this->postRepository->findNewestVersionBySlug($slug);

        return new Response($this->templating->render('BlogBundle:Default:post.html.twig', ['post' => $post]));
    }
}
