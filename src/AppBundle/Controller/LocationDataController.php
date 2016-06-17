<?php

namespace AppBundle\Controller;

use AppBundle\Exception\InvalidFormException;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\LocationData;

class LocationDataController extends FOSRestController
{
    public function getLocationdatasAction(Request $request)
    {
    	$data = $this->getDoctrine()->getRepository('AppBundle:LocationData')->findAll();
    	$view = $this->view($data, 200);
        return $this->handleView($view);
    }

    public function getLocationdataAction($id) {
		$data = $this->getDoctrine()->getRepository('AppBundle:LocationData')->find($id);
		$view = $this->view($data, 200);
        return $this->handleView($view);
    }

    public function postLocationdataAction(Request $request) 
    {
/*    	//die("blabla");
        try {
            $new = $this->container
                ->get('pai_rest.locationdata.form')
                ->post($request->request->all());
            $routeOptions = array(
                'id' => $new->getId(),
                '_format' => $request->get('_format')
            );
            $view = $this->routeRedirectView('api_1_get_locationdata', $routeOptions);
        }
        catch (InvalidFormException $exception)
        {
            $view = $this->view(array('form' => $exception->getForm()), 400);
        }
        return $this->handleView($view);*/

        $data = new LocationData();
        $data->setLat($request->request->get('lat'));
        $data->setLon($request->request->get('lon'));
        $data->setDistance($request->request->get('distance'));
        $data->setPostmanId($request->request->get('postman_id'));
        $data->setTimestamp($request->request->get('timestamp'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new Response('Saved new Location Data with id '.$data->getId());
    }
}