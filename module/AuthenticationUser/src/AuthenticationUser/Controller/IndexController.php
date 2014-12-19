<?php
namespace AuthenticationUser\Controller;

use AuthenticationUser\Form\LoginForm;
use AuthenticationUser\Form\LoginFormFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class IndexController extends AbstractActionController{


	public function getAuthService(){
		return $this->getServiceLocator()->get('AuthenticationUser');
	}

	public function indexAction(){
		$form = new LoginForm('user');
		$inputFiler = new LoginFormFilter('user');


		if($this->request->isPost()){
			$post = $this->request->getPost();
			$form->setData($post);
			$form->setInputFilter($inputFiler);


			if($form->isValid()){
				$this->getAuthService()->getAdapter()->setIdentity(
					$this->request->getPost('login'))
					->setCredential($this->request->getPost('password'));

				$result = $this->getAuthService()->authenticate();

				$form->setData(array('password'=>""));

				if($result->isValid()){

					$user_session = new Container('user');
					$user_session->offsetSet('admin','authentication');

					return $this->redirect()->toRoute('admin-panel');
				}else{
					return array(
						'auth_error'=>true,
						'form'=>$form
					);
				}
			}
		}
		return array(
			'form'=>$form
		);
	}

	public function logoutAction(){
		$session = new Container('user');
		$session->getManager()->getStorage()->clear('user');
		session_start();
		session_destroy();
		$this->redirect()->toRoute('admin');
	}
}
