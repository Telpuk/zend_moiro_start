<?php
namespace MoiroNews\Controller;

use MoiroNews\Form\NewsForm;
use MoiroNews\Form\NewsFormFilter;
use MoiroNews\Model\ScanDir;
use Zend\File\Transfer\Adapter\Http;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;
use Zend\Validator\File\Extension;

class AdminPanelController extends AbstractActionController{
	private $_newsTable = null;

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
		$this->layout()->setVariable('active_page' ,'admin');
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

		$files = $this->getDirFile($this->getFileUploadLocation());

		$renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
		$renderer->inlineScript()->appendFile($renderer->basePath() . '/js/add.js');

		$renderer->headScript()->appendFile($renderer->basePath() . '/js/cleditor1_4_4/jquery.cleditor.min.js',
			'text/javascript')->appendFile($renderer->basePath() . '/js/jquery.form.min.js');

		if($this->request->isPost()){
			$post = $this->request->getPost();
			$form->setInputFilter($inputFilter);
			$form->setData($post);
			if(!$form->isValid()){
				$form->setData($form->getData());
				return array(
					'files'=>$files,
					'form'=>$form
				);
			}
			$this->getNewsTable()->saveNew($form->getData());
			return $this->redirect()->toRoute(null,array('controller'=>'admin-panel', 'action'=>'index'));
		}
		return array(
			'files'=>$files,
			'form'=>$form
		);
	}


	public function uploadFileAction(){
		$response = $this->getResponse();
		$response->setStatusCode(200);

		$fileUpload =  $this->params()->fromFiles('file_name');

		if(is_array($fileUpload)){
			$validator = new Extension(array('png','jpg','gif','ico','docx','doc','pdf'),true);
			$adapter = new Http();
			$adapter->setDestination($this->getFileUploadLocation());

			if($validator->isValid($fileUpload) && $adapter->receive($fileUpload['name'])) {
				$response->setContent('true');
				return $response;
			}
		}
		$response->setContent('false');
		return $response;
	}

	public function deleteFileAction(){
		$response = $this->getResponse();
		$response->setStatusCode(200);

		$fileUpload =  $this->params()->fromPost('name_file');

		if(!empty($fileUpload)){
			unlink($this->getFileUploadLocation()."/{$fileUpload}");
			$response->setContent('true');
			return $response;
		}
		$response->setContent('false');
		return $response;
	}

	public function getFileUploadLocation(){
		$config  = $this->getServiceLocator()->get('config');
		return $config['module_config']['upload_location'];
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

		$files = $this->getDirFile($this->getFileUploadLocation());

		$renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
		$renderer->inlineScript()->appendFile($renderer->basePath() . '/js/edit.js');

		$renderer->headScript()->appendFile($renderer->basePath() . '/js/cleditor1_4_4/jquery.cleditor.min.js',
			'text/javascript')->appendFile($renderer->basePath() . '/js/jquery.form.min.js');

		$form->get('submitAddNews')->setAttribute('value','РЕДАКТИРОВАТЬ');

		$id = $this->params()->fromRoute('id');

		if(is_numeric($id) && !$this->request->isPost()) {
			$data = $this->getNewsTable()->fetchIdNew( $id );
			$form->bind( $data );
			return array(
				'files'=>$files,
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
					'files'=>$files,
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

	public function getDirFile($dir=null){
		$files = new ScanDir($dir);
		return $files->startScanDir();
	}

	public function getNewsTable(){
		if (!$this->_newsTable) {
			$this->_newsTable = $this->getServiceLocator()->get('MoiroNews\Model\NewsTable');
		}
		return $this->_newsTable;
	}
}