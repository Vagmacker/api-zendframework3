<?php

namespace SONUserRest;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'controllers' => [
        'factories' => [
            #Controller\UserRestController::class => InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'sonuser-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/user[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\UserRestController::class
                    ]
                ]
            ]
        ]
    ],
    'view_manager' => [
        'strategies' => ['ViewJsonStrategy']
    ],
    'doctrine' => [
        'driver' => [
            'SONUserRest_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'SONUserRest\Entity' => 'SONUserRest_driver'
                ]
            ]
        ]
    ]
];