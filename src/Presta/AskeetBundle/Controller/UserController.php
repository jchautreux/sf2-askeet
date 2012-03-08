<?php

namespace Presta\AskeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;

use Presta\AskeetBundle\Entity\User;
use Presta\AskeetBundle\Form\Type\UserType;

class UserController extends Controller
{
	
	public function loginAction()
	{
		$request = $this->getRequest();
		$session = $request->getSession();

		// get the login error if there is one
		if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		} else {
			$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
		}

		return $this->render('PrestaAskeetBundle:User:login.html.twig', array(
			// last username entered by the user
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error'		 	=> $error,
		));
	}
    
    /**
     * Creating a user
     * 
     * 
     * @author	Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @version	1.0 - 8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     * @since	8 mars 2012 - Jean-Christophe HAUTREUX <jchautreux@prestaconcept.net>
     */
    public function newAction(Request $request)
    {
    	$user = new User();
    	$form = $this->createForm(new UserType(), $user);
    	
    	if ($request->getMethod() == 'POST') {
    		$form->bindRequest($request);
    	
    		if ($form->isValid()) {
    			    			
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($user);
    			$em->flush();
    	
    			return $this->redirect($this->generateUrl('user_success'));
    		}
    	}
    	
    	return $this->render('PrestaAskeetBundle:User:new.html.twig', array('form' => $form->createView()));
    }
    
    public function successAction()
    {
        return $this->render('PrestaAskeetBundle:User:success.html.twig');
    }
}
