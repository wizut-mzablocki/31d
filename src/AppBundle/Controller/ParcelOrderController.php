<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ParcelOrderController extends FOSRestController 
{
	public function postParcelorderAction(Request $request) 
	{
		try 
		{
			$newParcel = $this->container->get('parcel_form.handler')->post($request->request->get('parcel'));
			$newSender = $this->container->get('addressdata_form.handler')->post($request->request->get('sender'));
			$newReceiver = $this->container->get('addressdata_form.handler')->post($request->request->get('receiver'));
			$newParcelorder = $this->container->get('parcelorder_form.handler')->post($request->request->all());
			$routeOptions = array('id' => $newParcelorder->getId(),'_format' => $request->get('_format'));
			
			$this->container->get('parcelorder_emailsender.handler')->sendEmail($request->request->all() );
			
			return $this->routeRedirectView('api_1_get_parcel', $routeOptions, Response::HTTP_CREATED);
		} 
		catch (InvalidFormException $exception) 
		{
			return array('form' => $exception->getForm());
		}
	}
	
	/**
	*deleteParcelorderAction - implemented by Krzysztof Młynarski
	*
	*/
	
	public function deleteParcelorderAction(Request $request, $id) 
	{ 
		var_dump($request);
		$parcel = $this->getDoctrine()->getRepository('AppBundle\Entity\ParcelOrder')->find($id);
		if ($parcel)
		{
			$this->getDoctrine()->getRepository('AppBundle\Entity\ParcelOrder')->delete($parcel);
		}
		else
		{			
			throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.', $id));
		}	
	}
}
