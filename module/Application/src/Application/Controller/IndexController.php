<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;

class IndexController extends AbstractActionController{
	private  $_pictureTable = false;
	private $_newsTable = false;

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
		$this->layout()->setVariable('active_page','home');

		return array(
			'local'=>true,
			'pictures'=>$this->getPictureTable()->fetchAll(),
			'news' => $this->getNewsTable()->fetchAll($paginated = false, 4)
		);
	}

	public function aboutUsAction(){
		$this->layout()->setVariable('active_page','aboutus');
		return array(
			'pictures'=>$this->getPictureTable()->fetchAll()
		);
	}

	public function localProjectAction(){
		return array(
			'pictures'=>$this->getPictureTable('local_picture')->fetchAll()
		);
	}

	public function contactsAction(){
		$this->layout()->setVariable('active_page','contacts');
		return array(
			'pictures'=>$this->getPictureTable()->fetchAll()
		);
	}

	private  function getPictureTable($table = null){
		if($table === 'local_picture') {
			return $this->_pictureTable = !$this->_pictureTable ? $this->getServiceLocator()->get('Application\Model\PictureLocalTable'):$this->_pictureTable;
		}
		return $this->_pictureTable = !$this->_pictureTable ? $this->getServiceLocator()->get('Application\Model\PictureTable'):$this->_pictureTable;
	}

	public function getNewsTable(){
		return $this->_newsTable = !$this->_newsTable ? $this->getServiceLocator()->get('MoiroNews\Model\NewsTable') :$this->_newsTable;
	}
}
