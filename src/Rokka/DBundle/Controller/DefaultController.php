<?php

namespace Rokka\DBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RokkaDBundle:Default:index.html.twig');
    }
}
