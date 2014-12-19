<?php
namespace MoiroNews\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;

class IndexController extends AbstractActionController{
	private  $newsTable = null;

	public function onDispatch(MvcEvent $e){
		$session = new Container('user');
		if($session->offsetExists('admin')) {
			$admin = $session->offsetGet('admin');
			if ( $admin && $admin === 'authentication' ) {
				$this->layout()->setVariable('admin',true);
			}
		}
		return parent::onDispatch($e);
	}

	public function indexAction(){
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

	public function getNewsTable(){
		if (!$this->newsTable) {
			$sm = $this->getServiceLocator();
			$this->newsTable = $sm->get('MoiroNews\Model\NewsTable');
		}
		return $this->newsTable;
	}
}
