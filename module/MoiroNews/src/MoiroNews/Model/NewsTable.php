<?php
namespace MoiroNews\Model;

use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;

class NewsTable{

	protected $tableGateway;

	public function __construct( TableGateway $tableGateway ){
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll(){
		$select = $this->tableGateway->getSql()->select()
		->columns(array(new Expression('id_new, title, date, SUBSTRING_INDEX(content,"[/more/]", 1) as content')))
		->order(array('date'=>'DESC'));
		$row = $this->tableGateway->selectWith($select);
		return $row;
	}


	public function fetchIdNew($id_new=null){

		$select = $this->tableGateway->getSql()
			->select()
			->columns(array(new Expression('id_new, title, date, REPLACE(content,"[/more/]", " ") as content')))
			->where(array('id_new'=>$id_new))->limit(1);
		$row = $this->tableGateway->selectWith($select);
		return $row;
	}


}