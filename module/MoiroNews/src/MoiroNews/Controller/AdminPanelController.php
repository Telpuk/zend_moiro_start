<?php
namespace MoiroNews\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AdminPanelController extends AbstractActionController{
	private $newsTable = null;

	public function indexAction(){
		return array(
			'news' => $this->getNewsTable()->fetchAll(),
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