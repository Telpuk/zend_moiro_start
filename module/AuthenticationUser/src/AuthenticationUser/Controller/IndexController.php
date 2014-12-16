<?php
namespace AuthenticationUser\Controller;

use AuthenticationUser\Form\LoginForm;
use AuthenticationUser\Form\LoginFormFilter;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{
	private  $newsTable = null;

	public function indexAction(){
		$form = new LoginForm('user');
		$inputFiler = new LoginFormFilter('user');

		if($this->request->isPost()){
			$post = $this->request->getPost();

			$form->setData($post);

			$form->setInputFilter($inputFiler);
			if($form->isValid()){

			}
		}
		return array(
			'form'=>$form
		);
	}


	public function getNewsTable(){
		if (!$this->newsTable) {
			$sm = $this->getServiceLocator();
			$this->newsTable = $sm->get('MoiroNews\Model\NewsTable');
		}
		return $this->newsTable;
	}
}
