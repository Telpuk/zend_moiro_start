<?php
namespace AuthenticationUser;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;

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
				'AuthenticationUser'=>function($sm){
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter, 'users', 'email','password','MD5(?)');
					$authService = new AuthenticationService();
					$authService->setAdapter($dbTableAuthAdapter);
					$authservice = $authService;
					return $authservice;
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
