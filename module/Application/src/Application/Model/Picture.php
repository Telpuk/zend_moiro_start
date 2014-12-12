<?php
namespace Application\Model;

class Picture{
	public $id_picture;
	public $title;
	public $description;
	public $file_name;
	public $path_in_project;

	public function __construct(){}

	public function exchangeArray($data){
		$this->id_picture     = isset($data['id_picture']) ? $data['id_picture'] : null;
		$this->title = isset($data['title']) ? $data['title'] : null;
		$this->description  = isset($data['description']) ? $data['description'] : null;
		$this->file_name  = isset($data['file_name']) ? $data['file_name'] : null;
		$this->path_in_project  = isset($data['path_in_project']) ? $data['path_in_project'] : null;
	}
}