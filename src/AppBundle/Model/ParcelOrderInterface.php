<?php
namespace AppBundle\Model;

Interface ParcelOrderInterface
{
	public function setParcel(\AppBundle\Entity\Parcel $parcel = null);
	public function getParcel();
	public function setSender(\AppBundle\Entity\AddressData $sender = null);
	public function getSender();
	public function setNotes($Notes);
	public function getNotes();
	public function setReceiver(\AppBundle\Entity\AddressData $receiver = null);
	public function getReceiver();
	public function setTracking($Tracking);
	public function getTracking();
	public function setParcelOrderHash($parcelOrderHash);
	public function getParcelOrderHash();
}