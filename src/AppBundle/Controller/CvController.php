<?php

namespace Agares\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CvController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Cv:index.html.twig');
    }
}