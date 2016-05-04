<?php
	namespace AppBundle\Handler;
	use AppBundle\Model\AddressDataInterface;
	Interface AddressDataFormHandlerInterface
	{
		public function post(array $parameters);
	}