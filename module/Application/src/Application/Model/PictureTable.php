<?php
namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Application\Model\Picture;

class PictureTable extends AbstractTableGateway{

	protected $table;

	public function __construct(Adapter $adapter, $name_table = 'pictures_global'){
		$this->table = $name_table;

		$this->adapter = $adapter;

		$this->resultSetPrototype = new ResultSet();

		$this->resultSetPrototype->setArrayObjectPrototype( new Picture());

		$this->initialize();
	}

	public function fetchAll(){
		$resultSet = $this->select();
		return $resultSet;
	}
}