<?php

namespace Presta\AskeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class QuestionController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('PrestaAskeetBundle:Question:index.html.twig');
    }
}
