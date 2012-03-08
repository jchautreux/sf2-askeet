<?php
// src/Presta/AskeetBundle/Form/Type/UserType.php

namespace Presta\AskeetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('username');
		$builder->add('password', 'password');
		//$builder->add('retype_password', 'password', array('property_path' => false));
	}
	
	public function getDefaultOptions(array $options)
	{
		return array(
	        'data_class' => 'Presta\AskeetBundle\Entity\User',
		);
	}
	
	public function getName()
	{
		return 'User';
	}
}