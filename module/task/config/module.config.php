<?php
return [
    'service_manager' => [
        'factories' => [
            \task\V1\Rest\SaveData\SaveDataResource::class => \task\V1\Rest\SaveData\SaveDataResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'task.rest.save-data' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/save-data[/:save_data_id]',
                    'defaults' => [
                        'controller' => 'task\\V1\\Rest\\SaveData\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'task.rest.save-data',
        ],
    ],
    'zf-rest' => [
        'task\\V1\\Rest\\SaveData\\Controller' => [
            'listener' => \task\V1\Rest\SaveData\SaveDataResource::class,
            'route_name' => 'task.rest.save-data',
            'route_identifier_name' => 'save_data_id',
            'collection_name' => 'save_data',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \task\V1\Rest\SaveData\SaveDataEntity::class,
            'collection_class' => \task\V1\Rest\SaveData\SaveDataCollection::class,
            'service_name' => 'saveData',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'task\\V1\\Rest\\SaveData\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'task\\V1\\Rest\\SaveData\\Controller' => [
                0 => 'application/vnd.task.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'task\\V1\\Rest\\SaveData\\Controller' => [
                0 => 'application/vnd.task.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \task\V1\Rest\SaveData\SaveDataEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'task.rest.save-data',
                'route_identifier_name' => 'save_data_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \task\V1\Rest\SaveData\SaveDataCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'task.rest.save-data',
                'route_identifier_name' => 'save_data_id',
                'is_collection' => true,
            ],
        ],
    ],
];
