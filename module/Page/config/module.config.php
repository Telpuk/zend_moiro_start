<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Page\Controller\Page' =>
                'Page\Controller\PageController'
        ),
    ),



    'router' => array(
        'routes' => array(
            'page' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/page[/:action][/:id][/id_user/:id_user]',
                    'constraints'=>array(
                        'action'=>"[a-zA-Z][a-zA-Z0-9_-]*",
                        'id'=>"[0-9]+"
                    ),
                    'defaults' => array(
                        'controller' => 'Page\Controller\Page',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action


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
