<?php
namespace Page\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class UserForm extends Form{

	public function __construct($name = "user"){
		parent::__construct($name);

		$this->setAttribute('method', 'post');
		$this->setAttribute('id', 'user_form');

		$this->add(
			array(
				'name'=>'login',
				'attributes'=>array(
					'type'=>'text',
					'placeholder'=>'логин'
				),
				'options'=>array(
					'label'=> 'логин'
				),
			)
		);


		$this->add(
			array(
				'name'=>'password',
				'attributes'=>array(
					'type'=>'password',
					'placeholder'=>'пароль'
				),
				'options'=>array(
					'label'=> 'пароль'
				),
			)
		);

		$this->add(
			array(
				'name'=>'submit',
				'attributes'=>array(
					'type'=>'submit',
					'value'=>'login',
				),
			)
		);

	}

}