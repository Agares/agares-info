<?php

namespace Agares\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
        $post = json_decode(file_get_contents($this->getParameter('kernel.root_dir').'/../posts/2016-04-29-1-modelling-people-s-names-is-hard.json'), true);
        $post['id'] = $post['published'] . '-' . $post['version'] . '-' . $post['slug'];

        return $this->render('AppBundle:Blog:index.html.twig', ['post' => $post]);
    }
}
