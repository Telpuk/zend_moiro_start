<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'MoiroNews\Controller\Index' => 'MoiroNews\Controller\IndexController',
			'MoiroNews\Controller\AdminPanel' => 'MoiroNews\Controller\AdminPanelController'
		),
	),

	'router' => array(
		'routes' => array(

			'news' => array(
				'type' => 'segment',
				'options' => array(
					'route'    => '/news[/:action][/:id]',
					'constraints'=>array(
						'action'=>"[a-zA-Z][a-zA-Z0-9_-]*",
						'id'=>"[0-9]+"
					),
					'defaults' => array(
						'__NAMESPACE__' => 'MoiroNews\Controller',
						'controller' => 'MoiroNews\Controller\Index',
						'action'     => 'index',
					),
				),
			),

			'admin-panel' => array(
				'type' => 'segment',
				'options' => array(
					'route'    => '/admin-panel[/:action][/:id]',
					'constraints'=>array(
						'action'=>"[a-zA-Z][a-zA-Z0-9_-]*",
						'id'=>"[0-9]+"
					),
					'defaults' => array(
						'__NAMESPACE__' => 'MoiroNews\Controller',
						'controller' => 'MoiroNews\Controller\AdminPanel',
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
