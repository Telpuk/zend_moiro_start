<?php
namespace MoiroNews\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class NewsFormFilter extends InputFilter{
	public function __construct(){
		$this->add(array(
			'name'=>'title',
			'required'=>true,
			'filters'=>array(
				array('name'=>'Zend\Filter\StripTags'),
				array('name' => 'Zend\Filter\StringTrim')
			),
			'validators'=>array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							NotEmpty::IS_EMPTY => 'ОБЯЗАТЕЛЬНО ДЛЯ ЗАПОЛНЕНИЯ!',
						),
					),
				),
			)
		));

		$this->add(array(
			'name'=>'content',
			'required'=>true,
//			'filters'=>array(
//				array('name'=>'Zend\Filter\StripTags'),
//				array('name' => 'Zend\Filter\StringTrim')
//			),
			'validators'=>array(
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							NotEmpty::IS_EMPTY => 'ОБЯЗАТЕЛЬНО ДЛЯ ЗАПОЛНЕНИЯ!',
						),
					),
				),
			)
		));
	}

}