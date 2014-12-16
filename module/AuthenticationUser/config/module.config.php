<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'AuthenticationUser\Controller\Index' =>
				'AuthenticationUser\Controller\IndexController'
		),
	),

	'router' => array(
		'routes' => array(
			'admin' => array(
				'type' => 'segment',
				'options' => array(
					'route'    => '/admin[/:action][/:id]',
					'constraints'=>array(
						'action'=>"[a-zA-Z][a-zA-Z0-9_-]*",
						'id'=>"[0-9]+"
					),
					'defaults' => array(
						'__NAMESPACE__' => 'AuthenticationUser\Controller',
						'controller' => 'AuthenticationUser\Controller\Index',
						'action'     => 'index',
					),
				),
			),
		),
	),



	//откуда будут браться views
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
	// Placeholder for console routes
	'console' => array(
		'router' => array(
			'routes' => array(
			),
		),
	),
);
