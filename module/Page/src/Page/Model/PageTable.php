<?php
namespace Page\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class PageTable extends AbstractTableGateway{
	protected $table = "page";

	public function __construct(Adapter $adapter){
		$this->adapter = $adapter;

		$this->resultSetPrototype = new ResultSet();

		$this->resultSetPrototype->setArrayObjectPrototype( new Page());

		$this->initialize();
	}

	public function fetchAll(){
		$resultSet = $this->select();
		return $resultSet;
	}

	public function getPage($id){
		$id = (int)$id;
		$rowSet = $this->select(array(
			'id_page'=>$id
		));
//        print_r()
		$row = $rowSet->current();

		if(!$row){
			throw new \Exception("Не найдена страница $id");
		}
		return $row;
	}

	public function savePage(Page $page){
		$data = array(
			"title"=>$page->title,
			"article"=>$page->article,
			"pub"=>date("Y-m-d H:i:s"),
		);

		$id = (int)$page->id_page;

		if(!$id)
			$this->insert($data);
		else
			$this->update($data, array('id_page'=>$id));
	}

	public function deletePage($id=null){

		if($id)
			$this->delete(array('id_page'=>$id));
	}
}