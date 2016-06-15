<?php
	namespace AppBundle\Handler;
	
	use Doctrine\Common\Persistence\ObjectManager;
	use Symfony\Component\Form\FormFactoryInterface;
	
	use AppBundle\Model\TaskInterface;
	use AppBundle\Form\TaskType;
	use AppBundle\Exception\InvalidFormException;
	
	class TaskFormHandler implements TaskFormHandlerInterface
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
			$task = $this->createTask();
			return $this->processForm($task, $parameters, 'POST');
		}
		
		public function put(TaskInterface $task, array $parameters)
		{
			return $this->processForm($task, $parameters, 'PUT');
		}
		
		private function processForm(TaskInterface $task, array $parameters, $method = "PUT")
		{
			$form = $this->formFactory->create($this->formType, $task,	array('method' => $method));
			$form->submit($parameters, 'PATCH' !== $method);
			if ($form->isValid()) 
			{
				$note = $form->getData();
				$this->repository->save($task);
				return $task;
			}
			throw new InvalidFormException('Invalid submitted data', $form);
		}
		
		private function createTask()
		{
			return new $this->entityClass();
		}
	}