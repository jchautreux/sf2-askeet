<?php
// src/Presta/AskeetBundle/Form/Type/QuestionType.php

namespace Presta\AskeetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class QuestionType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('title');
		$builder->add('content', 'textarea');
	}
	
	public function getDefaultOptions(array $options)
	{
		return array(
	        'data_class' => 'Presta\AskeetBundle\Entity\Question',
		);
	}
	
	public function getName()
	{
		return 'question';
	}
}