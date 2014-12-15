<?php
namespace MoiroNews\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{
	private  $newsTable = null;

	public function indexAction(){
		return array(
			'news' => $this->getNewsTable()->fetchAll(),
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
