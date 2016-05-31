<?php
namespace AppBundle\Model;

Interface ParcelInterface
{
	
	public function setNotes($Notes);
	public function getNotes();
	public function setWeight($Weight);
	public function getWeight();
}