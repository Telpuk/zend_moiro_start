<?php
namespace MoiroNews\Controller;

use MoiroNews\Form\NewsForm;
use MoiroNews\Form\NewsFormFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;

class AdminPanelController extends AbstractActionController{
	private $newsTable = null;

	public function onDispatch(MvcEvent $e){
		$session = new Container('user');
		if($session->offsetExists('admin')) {
			$admin = $session->offsetGet('admin');
			if ( !$admin && $admin !== 'authentication' ) {
				return $this->redirect()->toRoute('admin');
			}
		}else{
			return $this->redirect()->toRoute('admin');
		}
		$this->layout()->setVariable('admin', 'admin');
		return parent::onDispatch($e);
	}

	public function indexAction(){
		$this->layout()->active_page = 'admin';
		// grab the paginator from the AlbumTable
		$paginator = $this->getNewsTable()->fetchAll(true);
		// set the current page to what has been passed in query string, or to 1 if none set
		$paginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
		// set the number of items per page to 10
		$paginator->setItemCountPerPage(5);

		return array(
			'paginator' => $paginator
		);
	}

	public function moreInfoAction(){
		$id =  $this->params()->fromRoute('id', 0);
		return array(
			'new' => $this->getNewsTable()->fetchIdNew($id),
		);
	}

	public function addAction(){
		$form = new NewsForm('news');
		$inputFilter = new NewsFormFilter();

		if($this->request->isPost()){
			$post = $this->request->getPost();
			$form->setInputFilter($inputFilter);
			$form->setData($post);
			if(!$form->isValid()){
				$form->setData($form->getData());
				return array(
					'form'=>$form
				);
			}
			$this->getNewsTable()->saveNew($form->getData());
			return $this->redirect()->toRoute(null,array('controller'=>'admin-panel', 'action'=>'index'));
		}
		return array(
			'form'=>$form
		);
	}

	public function deleteAction(){
		$id = $this->params()->fromRoute('id');

		if(is_numeric($id)){
			$this->getNewsTable()->deleteNew($id);
		}
		return $this->redirect()->toRoute(null,array('controller'=>'admin-panel', 'action'=>'index'));

	}
	public function editAction(){
		$form = new NewsForm('news');
		$form->get('submitAddNews')->setAttribute('value','Редактировать');

		$id = $this->params()->fromRoute('id');

		if(is_numeric($id) && !$this->request->isPost()) {
			$data = $this->getNewsTable()->fetchIdNew( $id );
			$form->bind( $data );
			return array(
				'id'=>$id,
				'form' => $form
			);
		}else if(is_numeric($id) && $this->request->isPost()){
			$inputFilter = new NewsFormFilter();
			$post = $this->request->getPost();
			$form->setInputFilter( $inputFilter );
			$form->setData($post);
			if ( !$form->isValid() ) {
				$form->setData($post);
				return array(
					'id'=>$id,
					'form' => $form
				);
			}
			$data = $form->getData();
			$data['id_new'] = $id;
			$this->getNewsTable()->updateNew($data);
			return $this->redirect()->toRoute(null,array('controller'=>'admin-panel', 'action'=>'index'));
		}

	}

	public function getNewsTable(){
		if (!$this->newsTable) {
			$sm = $this->getServiceLocator();
			$this->newsTable = $sm->get('MoiroNews\Model\NewsTable');
		}
		return $this->newsTable;
	}
}