<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PostmenController extends FOSRestController
{
		public function getPostmenAction($id)
    {
        $data = $this->getDoctrine()->getRepository('AppBundle:Postman')
            ->find($id);
			$view = $this->view($data);
			return $this->handleView($view);
			
    }
	
	/**
	* @Route("/postman/edit", name="postman/edit")
	*/
	
	 public function postPostmanAction(Request $request){
  
        $postman = new \AppBundle\Entity\Postman();
        $form = $this->createForm("AppBundle\Form\Postmanform", $postman);

        return $this->render('AppBundle::add.html.twig', array('form'=>$form->createView()));
		
    }
	
	/**
	* @Route("/postman/edit/{id}", name="postman/edit/id")
	*/
	
	 public function editPostmanAction($id, Request $request){
  
        $postman = new \AppBundle\Entity\Postman();
        $form = $this->createForm("AppBundle\Form\Postmanform", $postman);

        return $this->render('AppBundle::add.html.twig', array('form'=>$form->createView(), 'id'=>$id));
		
    }
	
	/**
	* @Route("/postman/put/{id}", name="postman/put/id")
	*/
	
	 public function putPostmanAction($id, Request $request){
        $postman = $this->getDoctrine()->getRepository("AppBundle:Postman")->findOneById($id);
        $form = $this->createForm("AppBundle\Form\Postmanform", $postman);
		
		$form->handleRequest($request);
        if($request->isMethod("POST")){
          
                $em = $this->getDoctrine()->getManager();
                $em->persist($postman);
                $em->flush();
       
        }
		
        return $this->render('AppBundle::add.html.twig', array('form'=>$form->createView(), "id"=>$id));
		
    }
}
