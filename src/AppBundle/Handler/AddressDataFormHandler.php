<?php
	namespace AppBundle\Handler;
	
	use Doctrine\Common\Persistence\ObjectManager;
	use Symfony\Component\Form\FormFactoryInterface;
	
	use AppBundle\Model\AddressDataInterface;
	use AppBundle\Form\AddressDataType;
	use AppBundle\Exception\InvalidFormException;
	
	class AddressDataFormHandler implements ParcelOrderFormHandlerInterface
	{
		private $entityClass;
		private $repository;
		private $formFactory;
		private $formType;
		public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory, $formType)
		{
			$this->entityClass = $entityClass;
			$this->repository = $om->getRepository($this->entityClass);
			$this->formFactory = $formFactory;
			$this->formType = $formType;
		}
		
		public function post(array $parameters)
		{
			$addressdata = $this->createAddressdata();
			echo "AddresDataFormHandler.php";
			return $this->processForm($addressdata, $parameters, 'POST');
		}
		
		public function put(AddressdataInterface $addressdata, array $parameters)
		{
			return $this->processForm($addressdata, $parameters, 'PUT');
		}
		
		private function processForm(AddressdataInterface $addressdata, array $parameters, $method = "PUT")
		{
			$form = $this->formFactory->create($this->formType, $addressdata,	array('method' => $method));
			$form->submit($parameters, 'PATCH' !== $method);
			if ($form->isValid()) 
			{
				$note = $form->getData();
				$this->repository->save($addressdata);
				return $addressdata;
			}
			throw new InvalidFormException('Invalid submitted data', $form);
		}
		
		private function createAddressdata()
		{
			return new $this->entityClass();
		}
	}