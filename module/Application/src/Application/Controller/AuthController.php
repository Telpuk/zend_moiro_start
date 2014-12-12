<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\View;
use Application\Model\MyAdapter;

class AuthController extends AbstractActionController{
	public function indexAction(){

		$adapter = new MyAdapter("admin", "qwerty");

		$result = $adapter->authenticate($adapter);

		$code = $result->getCode();

		$identity = $result->getIdentity();


		return array(
			'code'=>$code,
			'identity'=>$identity
		);
	}

	public function loginAction(){
		return new View();
	}

	public function logoutAction(){
		return new View();
	}
}