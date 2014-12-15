<?php
namespace MoiroNews\Form;

use Zend\Form\Form;
use Zend\Form\Element\Textarea;

class NewsForm extends Form{

	public function __construct($name = null){
		parent::__construct($name);

		$this->setAttribute('method', 'post');

		$this->add(array(
			'name'=>'title',
			'attributes'=>array(
				'type'=>'text'
			),
			'options'=>array(
				'label'=>'ЗАГОЛОВОК НОВОСТИ'
			)
		));

		$this->add(array(
			'name'=>'content',
			'attributes'=>array(
				'type'=>new Textarea()
			),
			'options'=>array(
				'label'=>'ОПИСАНИЕ'
			)
		));
	}

}