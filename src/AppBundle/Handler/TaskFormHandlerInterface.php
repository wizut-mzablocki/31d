<?php
	namespace AppBundle\Handler;
	use AppBundle\Model\TaskInterface;
	Interface TaskFormHandlerInterface
	{
		public function post(array $parameters);
	}