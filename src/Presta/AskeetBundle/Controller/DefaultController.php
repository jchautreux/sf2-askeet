<?php

namespace Presta\AskeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('PrestaAskeetBundle:Default:index.html.twig', array('name' => $name));
    }
}
