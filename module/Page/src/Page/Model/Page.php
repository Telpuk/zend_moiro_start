<?php
namespace Page\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Page implements InputFilterAwareInterface{

	public $id_page;
	public $title;
	public $article;
	public $pub;

	protected $inputFilter;

	public function exchangeArray($data){
		$this->id_page = isset($data['id_page']) ? $data['id_page']: null;
		$this->title = isset($data['title']) ? $data['title']: null;
		$this->article = isset($data['article']) ? $data['article']: null;
		$this->pub = isset($data['pub']) ? $data['pub']: null;
	}

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
					'name'=>'article',
					'required'=>true,
					'filter'=>array(
						array('name'=>'StripTags'),
						array('name'=>'StringTrim')
					),
					'validators'=>array(
						array('name'=>'StringLength',
							'options'=>array(
								'encoding'=>'UTF-8',
								'min'=>10,
								'max'=> 1000
							)
						),
					)
				)
			));

			$inputFilter->add($factory->createInput(
				array(
					'name'=>'title',
					'required'=>true,
					'filter'=>array(
						array('name'=>'StripTags'),
						array('name'=>'StringTrim')
					),
					'validators'=>array(
						array('name'=>'StringLength',
							'options'=>array(
								'encoding'=>'UTF-8',
								'min'=>10,
								'max'=> 100
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