<?php
namespace Page\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Mime\Message;
use Zend\Validator\NotEmpty;

class User implements InputFilterAwareInterface{

	protected $inputFilter;

	public function setInputFilter(InputFilterInterface $inputFilter){
		throw new \Exception("Не используеться");
	}

	public function getArrayCopy(){
		return get_object_vars($this);
	}

	public function getInputFilter(){
		if(!$this->inputFilter){
			$inputFilter = new InputFilter();
			$factory = new InputFactory();


			$inputFilter->add($factory->createInput(
				array(
					'name'=>'login',
					'required'=>true,
					'filters'=>array(
						array('name'=>'StringTrim')
					),
					'validators' => array(
						array(
							'name' =>'NotEmpty',
							'options' => array(
								'messages' => array(
									NotEmpty::IS_EMPTY => 'Обязательно для заполенеия!'
								),
							),
						),
					),
				)
			));

			$inputFilter->add($factory->createInput(
				array(
					'name'=>'password',
					'required'=>true,
					'filters'=>array(
						array('name'=>'StringTrim')
					),
					'validators'=>array(
						array('name'=>'StringLength',
							'options'=>array(
								'encoding'=>'UTF-8',
								'min'=>6,
							)
						),
					)
				)
			));

			$this->inputFilter = $inputFilter;
		}

		return $this->inputFilter;
	}
}