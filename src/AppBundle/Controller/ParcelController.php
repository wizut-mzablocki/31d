<?php

namespace AppBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class ParcelController extends FOSRestController 
{
	public function getParcelAction($id) {
		return $this->getDoctrine()->getRepository('AppBundle:Parcel')
		->find($id);
	}
	public function getParcelsAction() { }
	public function postParcelAction(Request $request) 
	{
		try {
				$newParcel = $this→container->get('parcel_rest.parcel_form.handler')
				->post(
				$request->request->all()
				);
				$routeOptions = array(
				'id' => $newParcel->getId(),
				'_format' => $request->get('_format')
				);
				return $this->routeRedirectView('api_1_get_parcel', $routeOptions,
				Response::HTTP_CREATED);
			} 
			catch (InvalidFormException $exception) {
				return array('form' => $exception->getForm());
			}
	}
	public function putParcelAction(Request $request, $id) 
	{
		try
		{
			$parcel = $this->getDoctrine()->getRepository('AppBundle:Parcel')
			->find($id);
			
			if (!$parcel) {
				$statusCode = Response::HTTP_CREATED;
				$parcel = $this->container->get('parcel_rest.parcel_form.handler')
				->post($request->request->all());
			}
			else {
				$statusCode = Response::HTTP_NO_CONTENT;
				$parcel = $this->container->get('parcel_rest.parcel_form.handler')
				->put($parcel,$request->request->all());
			}
			$routeOptions = array(
				'id' => $parcel->getId(),
				'_format' => $request->get('_format')
			);
			return $this->routeRedirectView('api_1_get_parcel',$routeOptions,$statusCode);
		}
		catch (InvalidFormException $exception) 
		{
			return $exception->getForm();
		}
	}
	public function deleteParcelAction(Request $request, $id) { }
}