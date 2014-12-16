<?php
namespace AuthenticationUser\Model;



class User{
	public $id_new;
	public $title;
	public $content;
	public $date;

	protected $inputFilter;

	public function exchangeArray($data){
		$this->id_new = isset($data['id_new']) ? $data['id_new']: null;
		$this->title = isset($data['title']) ? $data['title']: null;
		$this->content = isset($data['content']) ? $data['content']: null;
		$this->date = isset($data['date']) ? $data['date']: null;
	}


	public function getArrayCopy(){
		return get_object_vars($this);
	}

}