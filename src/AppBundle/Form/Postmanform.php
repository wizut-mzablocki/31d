<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class Postmanform extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      
        $builder
            
			 ->add('username')
			 ->add('password')
			 ->add('phone')
             ->add('email')
             ->add('city')
            ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, array(
                "label" => "Zapisz"
            ))
			
          
        ;
    }

}
