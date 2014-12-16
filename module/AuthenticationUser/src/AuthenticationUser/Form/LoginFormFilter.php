<?php
namespace AuthenticationUser\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class LoginFormFilter extends InputFilter{
	public function __construct(){
		$this->add(array(
			'name'=>'login',
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
			'name'=>'password',
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
	}

}