<?php

namespace Presta\AskeetBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Presta\AskeetBundle\Entity\Question;
use Presta\AskeetBundle\Form\Type\QuestionType;


class QuestionController extends Controller
{
    
	/**
	 * Display all Question
	 * 
	 * 
	 * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
	 * @version	1.0 - 8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
	 * @since	8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
	 */
    public function indexAction()
    {
    	$questions = $this->getDoctrine()->getRepository('PrestaAskeetBundle:Question')->findAllJoinedToUser();
        return $this->render('PrestaAskeetBundle:Question:index.html.twig', 
        					array(	'questions' => $questions,
        							'successMsg' => false));
    }
    
    /**
     * Creating a question
     * 
     * 
     * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @version	1.0 - 8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @since	8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     */
    public function newAction(Request $request)
    {
    	$question = new Question();
    	$form = $this->createForm(new QuestionType(), $question);
    	
    	if ($request->getMethod() == 'POST') {
    		$form->bindRequest($request);
    	
    		if ($form->isValid()) {
    			
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($question);
    			$em->flush();
    	
    			return $this->redirect($this->generateUrl('question_success'));
    		}
    	}
    	
    	return $this->render('PrestaAskeetBundle:Question:new.html.twig', array('form' => $form->createView()));
    }
    
    /**
     * affiche un message de reussite au dessus de la liste des questions
     * 
     * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @version	1.0 - 8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @since	8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\Response
     */
    public function successAction()
    {
    	
    	$questions = $this->getDoctrine()->getRepository('PrestaAskeetBundle:Question')->findAllJoinedToUser();
        return $this->render('PrestaAskeetBundle:Question:index.html.twig', 
        					array(	'questions' => $questions,
        							'successMsg' => true));
    }
    
    /**
     * 
     * @param Integer $id
     * @return \Symfony\Bundle\FrameworkBundle\Controller\Response
     * 
     * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @version	1.0 - 8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @since	8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\Response
     */
    public function viewAction($id)
    {
    	$question = $this->getDoctrine()->getRepository('PrestaAskeetBundle:Question')->findOneByIdJoinedToOther($id);
    	return $this->render('PrestaAskeetBundle:Question:view.html.twig',
    					array(	'question' => $question ) );
    }
}
