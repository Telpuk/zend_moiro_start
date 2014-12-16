<?php
namespace AuthenticationUser;


use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module{
	public function onBootstrap(MvcEvent $e)
	{
		$eventManager = $e->getApplication()->getEventManager();
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
	}

//	public function getServiceConfig(){
//		return array(
//			'factories'=>array(
//				'MoiroNews\Model\NewsTable' =>  function($sm) {
//					$tableGateway = $sm->get('NewsTableGateway');
//					$table = new NewsTable($tableGateway);
//					return $table;
//				},
//				'NewsTableGateway' => function ($sm) {
//					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
//					$resultSetPrototype = new ResultSet();
//					$resultSetPrototype->setArrayObjectPrototype(new News());
//					return new TableGateway('news', $dbAdapter, null, $resultSetPrototype);
//				}
//			)
//		);
//	}

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
