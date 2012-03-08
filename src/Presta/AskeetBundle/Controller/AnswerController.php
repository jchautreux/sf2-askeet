<?php

namespace Presta\AskeetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Presta\AskeetBundle\Entity\Answer;
use Presta\AskeetBundle\Form\Type\AnswerType;


class AnswerController extends Controller
{
    /**
     * Creating an Answer
     * 
     * 
     * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @version	1.0 - 8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @since	8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     */
    public function newAction($id_question, Request $request)
    {
    	$answer = new Answer();
    	$question = $this->getDoctrine()->getRepository('PrestaAskeetBundle:Question')->find($id_question);
    	$answer->setQuestion($question);
    	$form = $this->createForm(new AnswerType(), $answer);
    	
    	if ($request->getMethod() == 'POST') {
    		$form->bindRequest($request);
    	
    		if ($form->isValid()) {
    			
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($answer);
    			$em->flush();
    	
    			return $this->redirect($this->generateUrl('question_view', array('id' => $id_question )));
    		}
    	}
    	
    	return $this->render('PrestaAskeetBundle:Answer:new.html.twig', array('form' => $form->createView(), 'id_question' => $id_question));
    }
}
