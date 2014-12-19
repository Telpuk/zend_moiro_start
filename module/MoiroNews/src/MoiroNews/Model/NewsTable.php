<?php
namespace MoiroNews\Model;

use Zend\Db\Sql\Expression;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class NewsTable{

	protected $tableGateway;

	public function __construct( TableGateway $tableGateway ){
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll($paginated = false, $limit = 5){

		$select = $this->tableGateway->getSql()->select()
			->columns(array(new Expression('id_new, title, date, SUBSTRING_INDEX(content,"[/more/]", 1) as content')))
			->order(array('date'=>'DESC'))->limit($limit);

		if($paginated) {
			// create a new Select object for the table album
			$resultSetPrototype = new ResultSet();

			$resultSetPrototype->setArrayObjectPrototype(new News());

			$paginatorAdapter = new DbSelect(
				$select,
				// the adapter to run it against
				$this->tableGateway->getAdapter(),
				// the result set to hydrate
				$resultSetPrototype
			);
			$paginator = new Paginator($paginatorAdapter);
			return $paginator;
		}
		$row = $this->tableGateway->selectWith($select);
		return $row;
	}

	public function fetchIdNew($id_new=null){

		$select = $this->tableGateway->getSql()
			->select()
			->columns(array(new Expression('id_new, title, date, REPLACE(content,"[/more/]", " ") as content')))
			->where(array('id_new'=>$id_new))->limit(1);
		$row = $this->tableGateway->selectWith($select);

		$row = $row->current();

		return $row;
	}

	public function getArrayCopy(){
		return get_object_vars($this);
	}

	public function deleteNew($id_new=null){
		$this->tableGateway->delete(array('id_new'=>$id_new));
	}

	public function updateNew(array $data){
		$this->tableGateway->update(array(
			'title'=>$data['title'],'content'=>$data['content']
		), array('id_new'=>$data['id_new']));
	}

	public function saveNew(array $data){
		$this->tableGateway->insert(array('content'=>$data['content'],'title'=>$data['title'], 'date'=>date("Y-m-d")));
	}



}