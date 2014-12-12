<?php
namespace Application\Model;

class Contact{
	public $id_contact;
	public $title;
	public $article;

	protected $inputFilter;

	public function exchangeArray($data){
		$this->id_contact = isset($data['id_contact']) ? $data['id_contact']: null;
		$this->title = isset($data['title']) ? $data['title']: null;
		$this->article = isset($data['article']) ? $data['article']: null;
	}
}