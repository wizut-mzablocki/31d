<?php
namespace AppBundle\Model;

Interface TaskInterface
{
    public function getId();
    public function setDone($done);
    public function getDone();
    public function setPostman(\AppBundle\Entity\Postman $postman = null);
    public function getPostman();
    public function setParcelorder(\AppBundle\Entity\ParcelOrder $parcelorder = null);
    public function getParcelorder();
}