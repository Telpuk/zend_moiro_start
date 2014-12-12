<?php
namespace Page\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class PageForm extends Form{

	public function __construct($name = "page"){
		parent::__construct($name);

		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype', 'application/x-www-form-urlencoded');
		$this->setAttribute('id', 'page_form');

		$this->add(
			array(
				'name'=>'id_page',
				'attributes'=>array(
					'type'=>'hide'
				)
			)
		);

		$this->add(
			array(
				'name'=>'article',
				'attributes'=>array(
					'type'=>'textarea'
				),
				'options'=>array(
					'label'=> 'Описание'
				),
			)
		);

		//добавление через Element
		$title = new Element('title');
		$title->setAttribute('type', 'text');
		$title->setLabel('Название');

		$this->add($title);

		$this->add(
			array(
				'name'=>'pub',
				'attributes'=>array(
					'type'=>'text',
					'disabled'=>true
				),
				'options'=>array(
					'label'=> 'Дата'
				),
			)
		);

		$this->add(
			array(
				'name'=>'submit',
				'attributes'=>array(
					'type'=>'submit',
					'value'=>'поехали',
					'id'=> 'submit_button'
				),
			)
		);

	}

}