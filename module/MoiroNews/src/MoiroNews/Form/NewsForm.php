<?php
namespace MoiroNews\Form;

use Zend\Form\Form;

class NewsForm extends Form{

	public function __construct($name = null){
		parent::__construct($name);

		$this->setAttribute('method', 'post');
		$this->setAttribute('action', 'add');

		$this->add(array(
			'name'=>'title',
			'attributes'=>array(
				'type'=>'text',
				'placeholder'=>'введите заголовок',
			),
			'options'=>array(
				'label'=>'ЗАГОЛОВОК НОВОСТИ'
			)
		));

		$this->add(array(
			'name'=>'content',
			'type'=>'Zend\Form\Element\Textarea',
			'attributes'=>array(
				'placeholder'=>'введите описание',
				'id'=>'content'
			),
			'options'=>array(
				'label'=>'ОПИСАНИЕ'
			)
		));

		$this->add(array(
			'name'=>'submitAddNews',
			'type'=>'Zend\Form\Element\Submit',
			'attributes'=>array(
				'value'=>'ДОБАВИТЬ'
			),
		));
	}


}