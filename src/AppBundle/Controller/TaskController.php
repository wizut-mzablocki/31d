<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PAI\ParcelBundle\Exception\InvalidFormException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TaskController extends FOSRestController
{
	public function getTaskAction($id) {
        return $this->getDoctrine()->getRepository('AppBundle:Parcel')->find($id);
    }
	
    public function getTasksAction() {
        return $this->getDoctrine()->getRepository('AppBundle:Parcel')->findAll();
    }
	
	public function postTaskAction(Request $request) {		
        try 
		{
			$newPostman = $this->container->get('postman_form.handler')->post($request->request->get('postman'));
			$newParcelOrder = $this->container->get('parcelorder_form.handler')->post($request->request->get('parcelorder'));
			$newTask = $this->container->get('task_form.handler')->post($request->request->all());
			$routeOptions = array('id' => $newTask->getId(),'_format' => $request->get('_format'));
			
			//$this->container->get('task_emailsender.handler')->sendEmail($request->request->all() );
			
			return $this->routeRedirectView('api_1_get_task', $routeOptions, Response::HTTP_CREATED);
		} 
		catch (InvalidFormException $exception) 
		{
			return array('form' => $exception->getForm());
		}
    }
	
	public function putTaskAction(Request $request, $id) {
        try {
            $task = $this->getDoctrine()->getRepository('AppBundle:Task')->find($id);
            if (!$task) {
                $statusCode = Response::HTTP_CREATED;
                $task = $this->container->get('pai_rest.task_form.handler')
                    ->post(
                        $request->request->all()
                    );
            } else {
                $statusCode = Response::HTTP_NO_CONTENT;
                $task = $this->container->get('pai_rest.task_form.handler')
                    ->put(
                        $task[0],
                        $request->request->all()
                    );
            }
            $routeOptions = array(
                'id' => $parcel->getId(),
                '_format' => $request->get('_format')
            );
            return $this->routeRedirectView('api_1_get_task', $routeOptions, $statusCode);
        } catch (InvalidFormException $exception) {
            return $exception->getForm();
        }
    }
    public function deleteTaskAction(Request $request, $id) {
        $task = $this->getDoctrine()->getRepository('AppBundle:Task')->find($id);
        if ($task) {
            $this->getDoctrine()->getRepository('AppBundle:Task')->delete($id);
        } else {
            throw new NotFoundHttpException(
                sprintf('The resource \'%s\' was not found.', $id)
            );
        }
    }
	
}
