<?php
namespace AuthenticationUser\Form;

use Zend\Form\Form;

class LoginForm extends Form{

	public function __construct($name = null){
		parent::__construct($name);

		$this->setAttribute('method', 'post');
		$this->setAttribute('action', 'admin');

		$this->add(array(
			'name'=>'login',
			'attributes'=>array(
				'type'=>'text',
				'placeholder'=>'логин',
			),
			'options'=>array(
				'label'=>'логин'
			)
		));

		$this->add(array(
			'name'=>'password',
			'attributes'=>array(
				'type'=>'password',
				'placeholder'=>'пароль',
			),
			'options'=>array(
				'label'=>'пароль'
			)
		));

		$this->add(array(
			'name'=>'submitAddNews',
			'type'=>'Zend\Form\Element\Submit',
			'attributes'=>array(
				'value'=>'ВОЙТИ'
			),
		));
	}


}