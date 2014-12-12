<?php
namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Form\Element\Checkbox;

class ContactForm extends Form{

	public function __construct($name = "contact"){
		parent::__construct($name);

		$this->setAttribute('method', 'get');


		$this->add(
			array(
				'name'=>'id_contact',
				'attributes'=>array(
					'type'=>'hide'
				)
			)
		);

		$this->add(
			array(
				'name'=>'article',
				'attributes'=>array(
					'type'=>'text'
				),
				'options'=>array(
					'label'=> 'Описание'
				),
			)
		);
		$this->add(array(
			'type' => 'Zend\Form\Element\MultiCheckbox',
			'name' => 'checkbox',
             'options' => array(
			'label' => 'What do you like ?',
			'value_options' => array(
				'0' => 'Apple',
				'1' => 'Orange',
				'2' => 'Lemon',
			),
		)
     ));

		//добавление через Element
		$title = new Element('title');
		$title->setAttribute('type', 'text');
		$title->setLabel('Название');

		$this->add($title);


		$this->add(
			array(
				'name'=>'submit',
				'attributes'=>array(
					'type'=>'submit',
					'value'=>'отравить',
					'id'=> 'submit_button'
				),
			)
		);

	}

}