<?php
	namespace AppBundle\Handler;
	use AppBundle\Model\ParcelOrderInterface;
	Interface ParcelOrderFormHandlerInterface
	{
		public function post(array $parameters);
	}