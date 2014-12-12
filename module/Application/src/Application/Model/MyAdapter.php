<?php
namespace Application\Model;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result;
use Zend\Db\Adapter\Adapter;

class MyAdapter extends AuthAdapter implements AdapterInterface{

	public $username;
	public $password;

	public function __construct($username, $password){
		$dbAdapter = new Adapter(array(
			'driver'=>'Pdo',
			'dsn'=>'mysql:dbname=zend;host=localhost',
			'username'=>'root',
			'password'=>'ideos'
		));
		parent::__construct($dbAdapter, 'users','user' ,'password');
		$this->username = $username;
		$this->password = $password;
		$this->setIdentity($username)->setCredential($password);
	}

	public function authenticate(){

		$res = parent::authenticate();
		return $res;

//		$flag = ($this->username == 'admin' && $this->password=='admin')?true:false;
//
//		if($flag){
//			return new Result(Result::SUCCESS,"user");
//		}else{
//			return new Result(Result::FAILURE,"guest");
//		}


	}
}