<?php
namespace AppBundle\Handler;

Interface ParcelOrderSendEmailHandlerInterface
{
    public function sendEmail(array $parcelOrder);
}

