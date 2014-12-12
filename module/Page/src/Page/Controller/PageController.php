<?php
namespace Page\Controller;

use Page\Model\User;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\SessionManager;
use Zend\View\Model\ViewModel;
use Page\Model\Page;
use Page\Form\PageForm;
use Application\Model\MyAdapter;
use Page\Form\UserForm;
use Zend\Session\Container;
use Page\Model\Acl;



class PageController extends AbstractActionController{
	protected  $pageTable;
	public   $acl;


	public function indexAction(){
		$username = "";
		$password = "";


		$isVisiblePage = false;
		$request = $this->getRequest();

		/*===========РОЛИ==============*/
		$acl = new Acl();
		$this->acl = $acl->getAcl();


		$user = new User();
		$form = new UserForm('user');


		if($request->isPost()){
			$form->setData(array('login'=>$request->getPost('login'),'password'=>''));
			$username = $request->getPost("login");
			$password = $request->getPost("password");

			$adapter = new MyAdapter($username, $password);

			$result = $adapter->authenticate($adapter);



			$_SESSION['isLogin'] = $result->isValid()?1:'';
			$_SESSION['roleUser'] = $result->isValid()?$username:'guest';
		}



		if(isset($_SESSION['isLogin'])){
			return array(
				'pages'=>$this->getPageTable()->fetchAll(),
				'acl'=>$this->acl,
			);
		}else{
			return array(
				'form'=> $form,
			);
		}
	}

	public function deleteAction(){

		$request = $this->getRequest();

		if($request->isPost()){
			$del = $request->getPost("del", "No");
			if($del == "Yes"){
				$this->getPageTable()->deletePage($this->params()->fromRoute('id', 0));
				$this->redirect()->toRoute('page');
			}

		}

		if($this->params()->fromRoute('id', 0)){
			return array(
				'id'=>$this->params()->fromRoute('id', 0),
				'page'=>$this->getPageTable()->getPage($this->params()->fromRoute('id', 0))
			);
		}



	}

	public function updateAction(){
		$form = new PageForm('page');

		$id  = (int)$this->params()->fromRoute('id', 0);

		if(!$id){
			$this->redirect()->toRoute('page', array('action'=>'add'));
		}
		$page = $this->getPageTable()->getPage($id);

		$form->bind($page);

		$form->get('submit')->setAttribute('value','Редактировать');

		$request = $this->getRequest();

		/*Если пришло постом*/
		if($request->isPost()){

			$form->setInputFilter($page->getInputFilter());
			$form->setData($request->getPost());

			if($form->isValid()){
				//сохраняем данные страницы через PageTAble
				$page->id_page = $id;

				$this->getPageTable()->savePage($page);

				$this->redirect()->toRoute('page');
			}
		}

		return array(
			'id'=>$id,
			'form'=>$form
		);
	}

	public function addAction(){
		$form = new PageForm('page');

		$request = $this->getRequest();

		/*Если пришло постом*/
		if($request->isPost()){
			$page = new Page();
			$form->setInputFilter($page->getInputFilter());
			$form->setData($request->getPost());

			if($form->isValid()){
				//заполняем экземпляр страницы данными формы
				$page->exchangeArray($form->getData());
				//сохраняем данные страницы через PageTAble
				$this->getPageTable()->savePage($page);

				$this->redirect()->toRoute('page');
			}
		}
		return new ViewModel(array('form'=>$form));
	}



	public function getPageTable(){
		if(!$this->pageTable){
			$this->pageTable = $this->getServiceLocator()->get('Page\Model\PageTable');
		}
		return $this->pageTable;
	}

	public function logoutAction(){
		session_regenerate_id();
		session_destroy();
		$this->redirect()->toRoute('page');
	}
}
