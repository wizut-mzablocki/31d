<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/mobilepost", name="mobilepost")
     */
    public function indexAction()
    {
		

        return $this->render('AppBundle:Default:index.html.twig');
    }
	
	/**
     * @Route("/postmanpanel", name="postman_panel")
     */
	public function postmanpanelAction()
	{
		return $this->render('AppBundle:MobilePost:index.html.twig');
	}
}
