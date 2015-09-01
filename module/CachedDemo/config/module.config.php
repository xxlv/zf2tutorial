<?php

return array(

    'router' => array(
        'routes' => array(
            'cached-demo' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/demo/cache',
                    'defaults' => array(
                        'controller' => 'CachedDemo\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'cached-demo2' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/demo/cache2',
                    'defaults' => array(
                        'controller' => 'CachedDemo\Controller\Index',
                        'action'     => 'test',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories'=>array(
            'cache'=>function(){
                return Zend\Cache\StorageFactory::factory(array(
                    'adapter'=>array(
                        'name'=>'filesystem',
                            'options'=>array(
                                'ttl'=>100,
                                'dirLevel'=>2,
                                'cacheDir'=>'data/cache',
                                'dirPermission'=>0755,
                                'filePermission'=>0666,
                                'namespaceSeparator'=>'-demo-'
                            ) ,
                        ),
                        'plugins'=>array('serializer')
                ));
            }
        )

    ),
    'controllers' => array(
        'invokables' => array(
            'CachedDemo\Controller\Index'=>'CachedDemo\Controller\IndexController'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);
