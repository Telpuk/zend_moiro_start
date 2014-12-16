<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{
	private  $pictureTable = null;

    public function indexAction(){
        return array(
			'pictures'=>$this->getPictureTable()->fetchAll()
		);
    }

	public function aboutUsAction(){
		return array(
			'pictures'=>$this->getPictureTable()->fetchAll()
		);
	}

	public function contactsAction(){


		return array(
			'pictures'=>$this->getPictureTable()->fetchAll()
		);
	}



	private  function getPictureTable(){
		if(is_null($this->pictureTable)){
			$this->pictureTable = $this->getServiceLocator()->get('Application\Model\PictureTable');
		}
		return $this->pictureTable;
	}
}
