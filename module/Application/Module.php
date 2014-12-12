<?php
namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Application\Model\PictureTable;

class Module{
	public function onBootstrap(MvcEvent $e)
	{
		$eventManager = $e->getApplication()->getEventManager();
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
	}

	public function getServiceConfig(){
		return array(
			'factories'=>array(
				'Application\Model\PictureTable' => function($serviceManager){
					$dbAdapter = $serviceManager->get('Zend\Db\Adapter\Adapter');
					$table = new PictureTable($dbAdapter);
					return $table;
				}
			)
		);
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}
}
