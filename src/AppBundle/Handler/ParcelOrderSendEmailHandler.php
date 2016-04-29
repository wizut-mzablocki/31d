<?php
namespace AppBundle\Handler;

class ParcelOrderSendEmailHandler implements ParcelOrderSendEmailHandlerInterface 
{
    public function sendEmail(array $parcelOrder)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject( 'ParcelOrder: '+$parcelOrder->getId() )
            ->setFrom( 'admin@example.com' )
            ->setTo( $parcelOrder->getEmail() )
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                    'ParcelOrder/confirmation_email.html.twig',
                    array()
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $this->get('mailer')->send($message);
    }
}

