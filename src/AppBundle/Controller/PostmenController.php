<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\COmponent\HttpKernel\Exception\NotFoundHttpException;

class PostmenController extends FOSRestController
{
    public function getPostmenAction()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Postman')
        ->findAll();
    }
    public function getPostmanAction($id) 
    { 
        $data = $this->getDoctrine()->getRepository('AppBundle:Postman')->find($id);
        $view = $this->view($data);
        return $this->handleView($view);
    }
    public function putPostmanAction(Request $request, $id) 
    {
   
        
        try {
        $postman = $this->getDoctrine()->getRepository('AppBundle:Postman')->find($id);
        if (!$postman) {
        $statusCode = Response::HTTP_CREATED;
        $postman = $this->container->get('postman_form.handler')
        ->post(
        $request->request->all()
        );
        } else {
        $statusCode = Response::HTTP_NO_CONTENT;
        $postman = $this->container
        ->get('postman_form.handler')
        ->put(
        $postman,
        $request->request->all()
        );
        }
        $routeOptions = array(
        'id' => $postman->getId(),
        '_format' => $request->get('_format')
        );
        return $this->routeRedirectView(
        'get_postman',
        $routeOptions,
        $statusCode
        );
        } catch (InvalidFormException $exception) {
        return $exception->getForm();
            }
    }
    public function deletePostmanAction(Request $request, $id) 
    { 
        $em = $this->getDoctrine()->getManager();
        $postman = $em->getRepository('AppBundle:Postman')->find($id);
        if (!$postman) {
            throw $this->createNotFoundException(
                'No postman found for id '.$id
            );
        }
        $em->remove($postman);
        $em->flush();
        return new Response('User id='.$id.' has been removed!');
    }
}
