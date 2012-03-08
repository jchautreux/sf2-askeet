<?php
// src/Presta/AskeetBundle/Form/Type/AnswerType.php

namespace Presta\AskeetBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AnswerType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('title');
		$builder->add('authorName', null, array('label' => 'Auteur'));
		$builder->add('content', 'textarea');
	}
	
	public function getDefaultOptions(array $options)
	{
		return array(
	        'data_class' => 'Presta\AskeetBundle\Entity\Answer',
		);
	}
	
	public function getName()
	{
		return 'Answer';
	}
}